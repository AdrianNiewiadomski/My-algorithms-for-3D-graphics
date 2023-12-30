var gui;
var obj = {
    add:function(){
        //console.log("clicked")
        model.zapisz();
    }
};



function displayGUI(nazwa){
    gui = new dat.GUI();

    var speed =0.1;
    var jar;            //jar przetrzymuje wartosc

    parameters = {
        a: "text.txt",
        b: "",
        c: "explode",

    };

    // console.log(this.parameters);
    if(nazwa!=""){
        this.parameters.a=nazwa;
    }

    var name = gui.add(parameters, 'a').name('Nazwa');
    var geometr = gui.add(parameters, 'b', pliki).name('Model');
    geometr.onChange(function(jar){
        // parameters.a = jar;
        // console.log(parameters.a);
        //name.name(jar);
        //name = gui.add(parameters, 'a');
        //console.log(jar);
        name.setValue(jar);
        // model.wczytajZServera(sciezka2+jar);
        model.wczytajZServeraIPopraw(sciezka2+jar);
    });

    gui.add(obj,'add').name('Pobierz model');

    //gui.close();
    gui.open();
}
