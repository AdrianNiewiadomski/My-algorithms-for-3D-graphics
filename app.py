import os

from flask import Flask, render_template

app = Flask(__name__)


@app.route("/")
def hello_world():
    return render_template("index_view.html")


@app.route("/cross_section_view")
def view_models():
    files = os.listdir("_uploads")
    return render_template("cross_section_view.html", files=files)
