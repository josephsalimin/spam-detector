from flask import Flask, request, jsonify, session, redirect, url_for
from get_tweepy import TweepyAPI



app = Flask(__name__)
app.config['DEBUG'] = True


@app.route('/tweepy', methods=['POST', 'GET'])
def request_tweepy():
	if request.method == 'POST':
		# Get session
		session['spam_text'] = request.values.get('spam_text')

	try:
		result = TweepyAPI.main_class(session['spam_text'])
	except KeyError:
		error = {
			'Result': 'Error Not Found'
		}
		return jsonify(error)


@app.route('/')
def index():
	return redirect(url_for('request_tweepy'), code=307)


if __name__ == '__main__':
	app.run(host='0.0.0.0', port=4040)