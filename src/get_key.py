
# Get the key
consumer_key = input("Input your consumer key :\n")
consumer_secret = input("Input your consumer secret key :\n")
access_token = input("Input your access token :\n")
access_token_secret = input("Input your access token secret\n")
# Open the file
fout = open("key.txt", "w")
# Out
fout.write(consumer_key + "\n")
fout.write(consumer_secret + "\n")
fout.write(access_token + "\n")
fout.write(access_token_secret + "\n")
# Save
fout.close()
# Echo
print("File saved!")