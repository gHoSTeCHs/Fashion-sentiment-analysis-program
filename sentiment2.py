import mysql.connector
import streamlit as st
from textblob import TextBlob
import pandas as pd
import altair as alt
from vaderSentiment.vaderSentiment import SentimentIntensityAnalyzer
from wordcloud import WordCloud
import matplotlib.pyplot as plt

dbcon = mysql.connector.connect(
  host = "localhost",
  port = 3307,
  user = "root",
  password = "",
  database = "fashion_reviews"
)
cursor = dbcon.cursor()
column_name = "name"

def convert_to_df(sentiment):
	sentiment_dict = {'polarity':sentiment.polarity,'subjectivity':sentiment.subjectivity}
	sentiment_df = pd.DataFrame(sentiment_dict.items(),columns=['metric','value'])
	return sentiment_df

def analyze_token_sentiment(docx):
	analyzer = SentimentIntensityAnalyzer()
	pos_list = []
	neg_list = []
	neu_list = []
	for i in docx.split():
		res = analyzer.polarity_scores(i)['compound']
		if res > 0.1:
			pos_list.append(i)
			pos_list.append(res)

		elif res <= -0.1:
			neg_list.append(i)
			neg_list.append(res)
		else:
			neu_list.append(i)

	result = {'positives':pos_list,'negatives':neg_list,'neutral':neu_list}
	return result 

# Main App
def main():
  st.title("Sentiment Analysis")
  # fetch products and display each as a selectbox option
  cursor.execute(f"SELECT {column_name} FROM products")
  options = [row[0] for row in cursor.fetchall()]
  select_option = st.sidebar.selectbox("Select product", options)
  st.subheader("Selected Product:")
  st.write(select_option)
  
  # Quert DB for reviews related to the selected product category
  query2 = f"SELECT review FROM reviews WHERE product='{select_option}'"
  cursor.execute(query2)
  reviews = [row[0] for row in cursor.fetchall()]
  
# Display reviews in a text-box
  reviews_text = "\n".join(reviews)
  with st.form(key='nlpForm'):
    raw_text = st.text_area("Reviews", reviews_text)
    submit_button = st.form_submit_button(label='Analyze')

  # layouts
  col1,col2 = st.columns(2)
  if submit_button:
			with col1:
				st.info("Results")
				sentiment = TextBlob(raw_text).sentiment
				st.write(sentiment)

				# Emoji
				if sentiment.polarity > 0:
					st.markdown("Sentiment:: The general sentiment on this product is Positive :smiley: ")
				elif sentiment.polarity < 0:
					st.markdown("Sentiment:: Negative :angry: ")
				else:
					st.markdown("Sentiment:: Neutral 😐 ")

				# Dataframe
				result_df = convert_to_df(sentiment)
				st.dataframe(result_df)

				# Visualization
				c = alt.Chart(result_df).mark_bar().encode(
					x='metric',
					y='value',
					color='metric')
				st.altair_chart(c,use_container_width=True)
    
				# Word Cloud
				wordcloud = WordCloud(width=800, height=400, background_color='white').generate(raw_text)

    		# Display the word cloud using Matplotlib
				plt.figure(figsize=(10, 5))
				plt.imshow(wordcloud, interpolation='bilinear')
				plt.axis('off')
				st.pyplot(plt)

			with col2:
				st.info("Token Sentiment")

				token_sentiments = analyze_token_sentiment(raw_text)
				st.write(token_sentiments)
if __name__ == "__main__":
  main()