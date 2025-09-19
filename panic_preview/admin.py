from flask import Flask

app = Flask(__name__)

@app.route('/internal/flag')
def secret():
    # primary flag
    return 'FLAG: cbc{redirect_ssrf_thumbs_up}\n'

if __name__ == '__main__':
    app.run(host='127.0.0.1', port=5000, debug=False)
