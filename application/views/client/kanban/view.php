<style>
    
html{
    font-family: "Nunito";
    --scrollbarBG: #1B1C28;
    --thumbBG: #ffff;

}
body{
    box-sizing: border-box;
    margin: 0;
    overflow: auto;
    padding: 0;
    background-color: #FFFF;  
    height: 100%;
    width: 100%;  
    scrollbar-width: thin;
    scrollbar-color: var(--thumbBG) var(--scrollbarBG);
}

body::-webkit-scrollbar{
    width: 11px;
    height: 4px;
}
body::-webkit-scrollbar:horizontal{
    height: 4px;
}
  
body::-webkit-scrollbar-track, body::-webkit-scrollbar-track:horizontal {
    background: var(--scrollbarBG);
}
body::-webkit-scrollbar-thumb, body::-webkit-scrollbar-thumb:horizontal {
    background-color: var(--thumbBG) ;
    border-radius: 6px;
    border: 3px solid var(--scrollbarBG);
}
.boards {
    display: inline-flex;
    flex: 1;
    height: 100%;
    width: 100%;
    border-top: 1px solid rgb(212, 212, 212);
}

.board {
    background: #F5F5F5;
    margin: 0 .5rem;
    padding: 0px;
    display: flex;
    flex: 1;
    flex-direction: column;
}

.board h3 {
    padding: 16px!important;
    min-width: 300px;
    width: 100%;
    margin: 0;
    background-color: #E6B86A;
    font-weight: bold;
    font-size: 18px;
    color: #1C1C2E;
}

.dropzone {
    padding: 16px;
    min-width: 300px;
    min-height: 200px;
    justify-content: center;
    height: 100%;
}

.kanbanCard {
    background-color: #FFFF;
    padding: 16px;
    width: 250px;
    margin: auto;
    margin-bottom: 2rem;
    border-radius: 4px;
    font-weight: 600;
    font-size: 16px;
}

.description{
    color: #434343;
    font-weight: normal;
    font-size: 14px;
}

.red{
    border-left: 5px solid #E2163B;
}
.purple{
    border-left: 5px solid #4515CF;
}
.blue {
    border-left: 5px solid #158CCF;
}
.yellow{
    border-left: 5px solid #EFA20C;
}
.green{
    border-left: 5px solid #5AD111;
}

.highlight{
    background-color: #D7D7D7cc;
}
.kanbanCard, .dropzone{
    transition: 400ms;
}
.is-dragging, .darkmode .is-dragging{
    cursor: move!important;
    cursor: -webkit-grabbing;
    opacity: .3;
}
.over{
    background: #E9E9E9;
}

.form-inline{
    display: flex;
    align-items: center;
    justify-content: center;
}
label{
    margin:0!important
}
input{
    margin: 0rem 1rem 0rem .5rem!important;
}

.priority{
    cursor: pointer;
    color:#989898;
}
.is-priority, .darkmode .is-priority{
    cursor: pointer;
    color:#FF7A00;
}
.delete{
    color: #E2163B;
    cursor: pointer;
}
.invisibleBtn:focus, #theme-btn:focus{
    padding: 0;
    margin: 0;
    background: none;
    border: none;
    outline: none;
    cursor: pointer;
    box-shadow: none!important;
}
.invisibleBtn{
    padding: 0;
    margin: 0;
    background: none;
    border: none;
    cursor: pointer;
}


/* loading */
.loader {
    border: 16px solid white; /* Light grey */
    border-top: 16px solid #1d1f20; /* Blue */
    border-radius: 50%;
    width: 120px;
    height: 120px;
    animation: spin 2s linear infinite;
    background-color: transparent;
     /* Light grey */
}

@keyframes spin {
    100% { transform: rotate(360deg); }
    0% { transform: rotate(0deg); }
}
#loadingScreen{
    position: absolute;
    z-index: 30;
    width: 100vw;
    height: 100vh;
    overflow: hidden;
    background-color: white;
    display: flex;
    align-items: center;
    justify-content: center;
}

</style>
<div class="content-wrapper" style="min-height: 353px;">
        <div class="controls p-3">
        <form class="form-inline" id="form_kanban">
            <label for="titleInput">Title:</label>
            <input class="form-control form-control-sm" type="text" name="title" id="titleInput" autocomplete="off">
            <label for="descriptionInput">Description:</label>
            <input class="form-control form-control-sm" type="text" name="description" id="descriptionInput" autocomplete="off">
            <button class="btn btn-dark" id="add">Add</button>
            <button class="btn btn-danger mx-2" id="deleteAll">Delete All</button>
        </form>
    </div>
<section class="content" style="padding:1rem;">
    <div class="row" >
          <div id="loadingScreen">
        <div class="loader"></div>
    </div>

    <div class="boards overflow-auto p-0" id="boardsContainer">
    </div>

    <script>if (typeof module === 'object') {window.module = module; module = undefined;}</script>
    <script src="https://unpkg.com/material-components-web@latest/dist/material-components-web.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <script>if (window.module) module = window.module;</script>

    </div>
</section>
</div>

<script type="text/javascript">

//variables
let cardBeignDragged;
let dropzones = document.querySelectorAll('.dropzone');
let priorities;
// let cards = document.querySelectorAll('.kanbanCard');
let dataColors = [
    {color:"green", title:"to do"},
    {color:"blue", title:"in progress"},
    {color:"red", title:"done"}
];
let dataCards = {
    config:{
        maxid:0
    },
    cards:[]
};
let theme="light";
//initialize

$(document).ready(()=>{
    $("#loadingScreen").addClass("d-none");
    theme = localStorage.getItem('@kanban:theme');
    if(theme){
        $("body").addClass(`${theme==="light"?"":"darkmode"}`);
    }
    initializeBoards();
    if(JSON.parse(localStorage.getItem('@kanban:data'))){
        dataCards = JSON.parse(localStorage.getItem('@kanban:data'));
        console.log(dataCards);
        initializeComponents(dataCards);
    }
    initializeCards();
    $('#add').click(()=>{
        const title = $('#titleInput').val()!==''?$('#titleInput').val():null;
        const description = $('#descriptionInput').val()!==''?$('#descriptionInput').val():null;

        $('#titleInput').val('');
        $('#descriptionInput').val('');
        
        if(title && description){
            let id = dataCards.config.maxid+1;
            const newCard = {
                id,
                title,
                description,
                position:"green",
                priority: false
            }
            dataCards.cards.push(newCard);
            dataCards.config.maxid = id;
            save();
            appendComponents(newCard);
            initializeCards();
        }
    });
    $("#deleteAll").click(()=>{
        dataCards.cards = [];
        save();
    });
    $("#theme-btn").click((e)=>{
        e.preventDefault();
        $("body").toggleClass("darkmode");
        if(theme){
            localStorage.setItem("@kanban:theme", `${theme==="light"?"darkmode":""}`)
        }
        else{
            localStorage.setItem("@kanban:theme", "darkmode")
        }
    });
});

//functions
function initializeBoards(){    
    dataColors.forEach(item=>{
        let htmlString = `
        <div class="board">
            <h3 class="text-center">${item.title.toUpperCase()}</h3>
            <div class="dropzone" id="${item.color}">
                
            </div>
        </div>
        `
        $("#boardsContainer").append(htmlString)
    });
    let dropzones = document.querySelectorAll('.dropzone');
    dropzones.forEach(dropzone=>{
        dropzone.addEventListener('dragenter', dragenter);
        dropzone.addEventListener('dragover', dragover);
        dropzone.addEventListener('dragleave', dragleave);
        dropzone.addEventListener('drop', drop);
    });
}

function initializeCards(){
    cards = document.querySelectorAll('.kanbanCard');
    
    cards.forEach(card=>{
        card.addEventListener('dragstart', dragstart);
        card.addEventListener('drag', drag);
        card.addEventListener('dragend', dragend);
    });
}

function initializeComponents(dataArray){
    //create all the stored cards and put inside of the todo area
    dataArray.cards.forEach(card=>{
        appendComponents(card); 
    })
}

function appendComponents(card){
    //creates new card inside of the todo area
    let htmlString = `
        <div id=${card.id.toString()} class="kanbanCard ${card.position}" draggable="true">
            <div class="content">               
                <h4 class="title">${card.title}</h4>
                <p class="description">${card.description}</p>
            </div>
            <form class="row mx-auto justify-content-between">
                <span id="span-${card.id.toString()}" onclick="togglePriority(event)" class="material-icons priority ${card.priority? "is-priority": ""}">
                    star
                </span>
                <button class="invisibleBtn">
                    <span class="fas fa-trash-alt delete" onclick="deleteCard(${card.id.toString()})">
                        
                    </span>
                </button>
            </form>
        </div>
    `
    $(`#${card.position}`).append(htmlString);
    priorities = document.querySelectorAll(".priority");
}

function togglePriority(event){
    event.target.classList.toggle("is-priority");
    dataCards.cards.forEach(card=>{
        if(event.target.id.split('-')[1] === card.id.toString()){
            card.priority=card.priority?false:true;
        }
    })
    save();
}

function deleteCard(id){
    dataCards.cards.forEach(card=>{
        if(card.id === id){
            let index = dataCards.cards.indexOf(card);
            console.log(index)
            dataCards.cards.splice(index, 1);
            console.log(dataCards.cards);
            save();
        }
    })
}


function removeClasses(cardBeignDragged, color){
    cardBeignDragged.classList.remove('red');
    cardBeignDragged.classList.remove('blue');
    cardBeignDragged.classList.remove('purple');
    cardBeignDragged.classList.remove('green');
    cardBeignDragged.classList.remove('yellow');
    cardBeignDragged.classList.add(color);
    position(cardBeignDragged, color);
}

function save(){
   // console.log(dataCards);
    localStorage.setItem('@kanban:data', JSON.stringify(dataCards));
      $.ajax({
        url: "<?php echo base_url('client/kanban/add'); ?>",
        type: "POST",
        data: {dataCards},
        dataType: 'JSON',
        success: function(res){
            console.log(res);
          if(res == 1){
              toastr.success('ADDED');
          }
        }
      });

}

function position(cardBeignDragged, color){
    const index = dataCards.cards.findIndex(card => card.id === parseInt(cardBeignDragged.id));
    dataCards.cards[index].position = color;
    save();
}

//cards
function dragstart(){
    dropzones.forEach( dropzone=>dropzone.classList.add('highlight'));
    this.classList.add('is-dragging');
}

function drag(){
    
}

function dragend(){
    dropzones.forEach( dropzone=>dropzone.classList.remove('highlight'));
    this.classList.remove('is-dragging');
}

// Release cards area
function dragenter(){

}

function dragover({target}){
    this.classList.add('over');
    cardBeignDragged = document.querySelector('.is-dragging');
    if(this.id ==="yellow"){
        removeClasses(cardBeignDragged, "yellow");
        
    }
    else if(this.id ==="green"){
        removeClasses(cardBeignDragged, "green");
    }
    else if(this.id ==="blue"){
        removeClasses(cardBeignDragged, "blue");
    }
    else if(this.id ==="purple"){
        removeClasses(cardBeignDragged, "purple");
    }
    else if(this.id ==="red"){
        removeClasses(cardBeignDragged, "red");
    }
    
    this.appendChild(cardBeignDragged);
}

function dragleave(){
  
    this.classList.remove('over');
}

function drop(){
    this.classList.remove('over');
}
</script>