
## Installation

To run this program please note that the mysql server runs on port 3307 as opposed to the the default of 3306, so configure you server accordingly.

In you will find a folder named DataBase, open and import the database to your local server.

Then move the source code into the 'htdocs' folder of your 'xampp' folder.

You can then run the program by navigating to the folder name in the browser of your choice.


for the sentiment analysis engine, you will have to run this in your terminal to install the requirements to run the python script.

```bash
  pip install streamlit matplotlib altair pandas textblob wordcloud   vaderSentiment
```

Open the file sentiment2.py and from the terminal, run
```bash
  streamlit run sentiment2.py
```
to start the streamlit server.
