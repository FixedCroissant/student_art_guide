

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
var backspace;

function setup() {
  createCanvas(spac*5,spac*6);
    
  frm = createElement('form');
  frm.attribute('method',"get");
  frm.attribute('action',"/");  // i need the info for this
  frm.attribute('target', "_self");

  formInput = createInput(); //this button gets a value 
  formInput.attribute('name', "formInput");  //store entered number in the input
  frm.child(formInput);
  formInput.hide();// add the input for the  form
  
  submit = createInput('See Art');
  submit.id('submit');
  submit.attribute('type',"submit");
  submit.mousePressed(sendNumber);//it is type submit
  submit.position(spac*2,spac*5);  //move it below the 0 button
  frm.child(submit);  //make it a child of form
  
  background(255);
    
  for(i=0;i<11;i++){
       button[i] = createButton(i);
       button[i].mousePressed(changeNum);
       button[i].class('buttons');
       button[i].value = i;
  }
 
  button[1].position(spac,spac);
  button[4].position(spac,spac*2);
  button[7].position(spac,spac*3);
  button[2].position(spac*2,spac);
  button[5].position(spac*2,spac*2);
  button[8].position(spac*2,spac*3);
  button[3].position(spac*3,spac);
  button[6].position(spac*3,spac*2);
  button[9].position(spac*3,spac*3);
  button[0].position(spac*2,spac*4);
 

  backspace = createButton("←");
  backspace.position(spac*3,spac*4);
  backspace.mousePressed(back);
  backspace.class('buttons');
    
  
   
  
  
}

function draw() {  
    header = createP('Enter the number of the artwork.');
    header.id('header');
    header.position(200, 40);
    fill(255);
    noStroke();
    rect(spac,0,spac*3,spac);
    fill(0);
    textAlign(CENTER);
    textFont('GlyphaRoman',24);
    text(enteredNum, spac*2+spac/2,spac/2);
}

function changeNum() {
    if(enteredNum.length < 4)
    enteredNum += this.value;
}

function sendNumber() {
   formInput.value(enteredNum);
    //console.log(enteredNum);
}

function back() {
    enteredNum = enteredNum.substr(0,enteredNum.length-1);
}
/* Checklist

1.  Styling #427E93
2.  Input
3.  HTML Form
4.  Color
5.  Animation
    a.  do something with the text ARTS NCSU
    b.  background abstract w/ ncsu colors
        i. circles that fade in and out
        ii. stripes like the book
    c.  background images
        i.  pics from the webpage
        ii. student art photos selected at random
        
    
    

Questions

1.  How do I import the right fonts
2.  how do I make the buttons bigger
3.  how can I test the form
4.  how do I isolate the submit

 */
