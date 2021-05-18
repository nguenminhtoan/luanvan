/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

window.SpeechRecognition = 
        window.SpeechRecognition || window.webkitSpeechRecognition ; 

const recognition = new SpeechRecognition();

recognition.interimResults = true;

const mic = document.querySelector(".mic");
const words = document.querySelector(".words");
let p = document.createElement("p");

words.appendChild(p);

recognition.addEventListener("result",(e)=>{
    const transcript = e.results[0][0].transcript;
    p.textContent = transcript; 
});


 mic.addEventListener("click",(event) => {
    recognition.start(); 
 });