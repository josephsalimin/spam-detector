import tweepy
from booyer_moore import BooyerMoore

class TweepyAPI(tweepy.StreamListener):

	# Class variable
	consumer_key = "" 
	consumer_secret ="" 
	access_token = ""
	access_token_secret = ""

	def __init__(self, spam_text):
		self.api = 0
		self.list_texts = []
		self.count = 0
		self.spam_text = spam_text

	def on_status(self, status):
		get_text = status.text
		res = BooyerMoore.match_string(get_text, self.spam_text)
		self.list_texts.append(res)
		self.count += 1

		if (self.count > 5):
			# Disconnect
			return False
		return True
		

	def on_error(self, status_code):
		if status_code == 420:
			# Returning False in on_data disconnects the stream
			return False
	

	@classmethod
	def read_file(cls, file):
		with open(file, "r") as f:
			# Get the key
			contents = f.readlines()
			contents = [x.strip() for x in contents] 
			# Pass it
			cls.consumer_key = contents[0]
			cls.consumer_secret = contents[1]
			cls.access_token = contents[2]
			cls.access_token_secret = contents[3]

	@classmethod
	def main_class(cls, spam_text):
		# Get the access key and token
		cls.read_file("key.txt")
		# Authentication
		auth = tweepy.OAuthHandler(cls.consumer_key, cls.consumer_secret)
		auth.set_access_token(cls.access_token, cls.access_token_secret)

		# Get API
		api = tweepy.API(auth)

		# Create listener
		listener = cls(spam_text)
		stream = tweepy.Stream(auth = api.auth, listener = listener)
		stream.filter(track=['bitcoin', 'ethereum', 'stellar'], languages = ["en"], stall_warnings = True)

		return listener.list_texts
		

		
# Testing
# TweepyAPI.main_class()