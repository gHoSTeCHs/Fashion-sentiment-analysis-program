import string
from collections import Counter
import csv 


text = open('read.txt', encoding='utf-8').read()
lowercase = text.lower()
clean_text = lowercase.translate(str.maketrans('', '', string.punctuation))

tokenizedWords = clean_text.split()
# print(tokenizedWords)

inval_words = ["i", "me", "my", "myself", "we", "our", "ours", "ourselves", "you", "your", "yours", "yourself",
              "yourselves", "he", "him", "his", "himself", "she", "her", "hers", "herself", "it", "its", "itself",
              "they", "them", "their", "theirs", "themselves", "what", "which", "who", "whom", "this", "that", "these",
              "those", "am", "is", "are", "was", "were", "be", "been", "being", "have", "has", "had", "having", "do",
              "does", "did", "doing", "a", "an", "the", "and", "but", "if", "or", "because", "as", "until", "while",
              "of", "at", "by", "for", "with", "about", "against", "between", "into", "through", "during", "before",
              "after", "above", "below", "to", "from", "up", "down", "in", "out", "on", "off", "over", "under", "again",
              "further", "then", "once", "here", "there", "when", "where", "why", "how", "all", "any", "both", "each",
              "few", "more", "most", "other", "some", "such", "no", "nor", "not", "only", "own", "same", "so", "than",
              "too", "very", "s", "t", "can", "will", "just", "don", "should", "now"]

final_words = []

for word in tokenizedWords:
  if word not in inval_words:
    final_words.append(word);

# print (final_words)
    
emotion_list = [];

with open('emotions.txt', 'r') as file:
  for line in file:
    clear_line = line.replace('\n','').replace(',','').replace("'",'').strip()   
    word, emotion = clear_line.split(':')
    # print("Word: " + word + ' '+ "Emotion:" + emotion)    
    if word in final_words:
      emotion_list.append(emotion);

# print (emotion_list);
w = Counter(emotion_list)
# print (w);

column_index = 5
column_limit = 10

with open('testdata.manual.2009.06.14.csv', 'r') as csvfile:
  csvreader = csv.reader(csvfile)
  for row in csvreader:
    if len(row) > column_index:
      columns = row[column_index].lower()
      cleancol = columns.translate(str.maketrans('','',string.punctuation))
      tokenziedcol = cleancol.split()
      # print (cleancol)
      # print(tokenziedcol)
      finalcol = []
      for word in tokenziedcol:
        if word not in inval_words:
          finalcol.append(word)
          # print(finalcol)
          colemotions = []
          with open('emotions.txt', 'r') as file:
            for line in file:
              clear_line = line.replace('\n','').replace(',','').replace("'",'').strip()
              word, emotion = clear_line.split(':')
              if word in finalcol:
                colemotions.append(emotion);
                emocount = Counter(colemotions)
                # print(emocount)
            # print(colemotions)



