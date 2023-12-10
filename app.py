from flask import Flask, render_template

app = Flask(__name__)


@app.route("/")
def hello_world():
    return render_template("index_view.html")


@app.route("/view_models")
def view_models():
    return render_template("index.html")
