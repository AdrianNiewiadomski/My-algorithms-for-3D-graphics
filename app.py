import os
import pathlib

from flask import Flask, render_template, url_for

app = Flask(__name__)
PATH = str(pathlib.Path(__file__).parent.resolve())


@app.route("/")
def display_home():
    return render_template("index_view.html")


@app.route("/cross_section")
def display_cross_section_view():
    models_path = PATH + url_for("static", filename='_models')
    files = os.listdir(models_path)
    return render_template("cross_section_view.html", files=files)


@app.route("/model_corrector")
@app.route("/model_corrector_view/<chosen_file>")
def display_corrector_view(chosen_file: str = "text.txt"):
    models_path = PATH + url_for("static", filename="_incorrect_models")
    files = os.listdir(models_path)
    return render_template("model_corrector_view.html", files=files,
                           chosen_file=chosen_file)
