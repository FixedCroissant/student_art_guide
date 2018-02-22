//Justin Kuhn
//01/06/18
//for now, I'm just going to setup a welcome message and 10 buttons for the index for the art
var button = [];
var frm;
var enteredNum = " ";
var header;
var spac = 150;
var formInput;
var submit;
var body;
var test;
var backspace;

function setup() {

    //createCanvas(1400,150);

    //body.child(myCanvas);

    header = createP('Enter the number of the artwork:');
    header.id('header');
    header.style('margin-top:10px; margin-bottom:75px');
    header.class('col-md-12 col-sm-12 center');
    //header.position(325,30);


    //New div.
    newDiv = createElement('div')
    newDiv.class('row');

    enteredElement = createP(enteredNum);
    enteredElement.class('col-md-10');
    newDiv.child(enteredElement);

    //text element.
    //end text element
    // enteredElement.child($('#idNumber'));
    enteredElement.id('idNumber');


    //newDiv.child(text);


    // make form a child of the body.
    frm = createElement('form');
    //make form the child of the main div.
    newDiv.child(frm);
    frm.id('form');
    //Add class

    var domain ="http://www.domain.com/studentartguide";

    frm.attribute('method',"get");
    frm.attribute('action', domain + "/public/index.php/");
    frm.attribute('target', "_self");

    //add class.
    frm.class('col-md-10 col-md-offset-2');

    formInput = createInput(); //this button gets a value
    formInput.attribute('name', "id");  //store entered number in the input
    frm.child(formInput);
    formInput.hide();// add the input for the  form

    submit = createInput('See Art');
    submit.id('submit');
    submit.attribute('type',"submit");
    submit.mousePressed(sendNumber);//it is type submit
    submit.position(spac*2.8,spac*4.8);  //move it below the 0 button
    frm.child(submit);  //make it a child of form

    background(255);

    for(i=1;i<=9;i++){
        button[i] = createButton(i);

    }


    button[10] = createButton(0);

    for(i=1;i<=10;i++){
        button[i].mousePressed(changeNum);
        button[i].class('buttons');
        button[i].id('button'+i);
        button[i].style('display: table; margin:0');

        button[i].value = i;
        //add class
        //  button[i].class(button[i].class()+' col-md-4');

        //new super div
        div4 = createElement('div');
        div4.class('col-md-4 col-sm-4');
       // div4.style('size:100px')


        if (i==10){
            //div4.class(div4.class()+(' center'));
            div4.class('col-md-12 col-sm-12 center');
        }

        //button[i].child(div4);
        div4.child(button[i]);
    }//close for loop.



    /*
     * Create Backspace
     */
    //add div for backspace.
    div5 =   createElement('div');
    div5.class('col-md-12 col-sm-12 center');

    //backspace
    backspace = createButton("←");

    backspace.mousePressed(back);
    backspace.class('buttons');

    //add backspace to div 5
    div5.child(backspace);

    /**
     * END BACKSPACE
     *
     */

    button[10].value = 0;

    //add to new div element.

    //div2 = createElement('div');
    //div2.class('row');




    div3 = createElement('div');
    div3.class('col-md-6 col-sm-6 col-md-offset-3 test');

    //add it to div2

    //div2.child(div3);







    button1 = button[1];

    button2 = button[2];
    button3 = button[3];
    button4 = button[4];
    button5 = button[5];
    button6 = button[6];
    button7 = button[7];
    button8 = button[8];
    button9 = button[9];
    button10= button[10];
    // button10.class(button10.class()+' col-md-offset-4');








}

//backspace function
function back() {

  enteredNum2 = enteredNum.substring(0, enteredNum.length-1);
  setEnteredNumber(enteredNum2);

  console.log(enteredNum2);
  //Update value.
  $('#idNumber').text(enteredNum2);
}

function draw() {
      //fill(255);
      //noStroke();
      //rect(600,30,450,100);
      //fill(1);
      //textAlign(CENTER);
      //textFont('GlyphaRoman',24);
      //text(enteredNum, spac*2+spac/2,spac/2);

}

function setEnteredNumber(value){
    enteredNum=value;
}
function getEnteredNumber(){
    return enteredNum;
}


function changeNum() {

    if(enteredNum.length < 4) {
        // enteredNum = enteredNum + this.value;
        enteredNum = enteredNum + this.value;
       $('#idNumber').text(enteredNum);
    }
}

function sendNumber() {
    formInput.value(enteredNum);
}