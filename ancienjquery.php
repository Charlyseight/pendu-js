/*
$.get('/api/index.php',function(word){
     gameData.word = word;
     gameData.lettersCount = word.length;
     //gameData.replacementString = word.replace(/./g,'*');
     gameData.replacementString = gameData.replacementString.padStart(gameData.lettersCount,'*');
     render();
//   select();
});

$('form').on('submit',function(e){
    e.preventDefault();
    /******** Le code à exécuter quand on soumet une lettre******/
    /*
    let triedLetter = $('#select-letter option:selected').val();
    //Retirer de la liste -> Mettre l'alpha à jour
    gameData.alphabet = gameData.alphabet.replace(triedLetter,'');
    //Mettre dans les lettres essayées
    gameData.triedLetters += triedLetter;
    //Vérifier si la lettre est dans le mot
    let replacementString = '';
    let letterFound = false;
    for (let i= 0;i<=gameData.lettersCount;i++){
        if(gameData.word.charAt(i) === triedLetter.toUpperCase()){
            replacementString += triedLetter;
            letterFound = true;
        }else{
            replacementString += gameData.replacementString.charAt(i); 
        }
    }
    gameData.replacementString = replacementString;
    if(!letterFound){
        gameData.trials += 1;
        gameData.remainingTrials = gameData.maxTrials - gameData.trials;
        if (gameData.remainingTrials === 0){
            gameData.state = gameData.states[2];
        }
    }else{
        if(gameData.replacementString.toUpperCase() === gameData.word) {
            alert('Tu as gagné mon petit !')
            gameData.state = gameData.states[1];
        }
    }
    render();
});

function render(){
    $('#max-trials').text(gameData.maxTrials);
    $('#letters-count').text(gameData.lettersCount);
    $('#replacement-string').text(gameData.replacementString);
    $('#select-letter').find('option').remove();
    $('#tried-letters').text(gameData.triedLetters);
    //Créer les options....
    gameData.alphabet.split("").forEach(letter=>
        $("#select-letter").append(`<option value="${letter}">${letter}</option>`)
    );
       /***
    *
    * On a 3 états possible (winning, losing, playing)
    * Mais il n'y a qu'un état actif à la fois - playing
    * -> cacher les états inactifs .hide()
    * -> afficher l'état actif .show()
    ***/
    /************
    gameData.states.forEach(function(state){
        if(gameData.state === state){
            $(`#${state}`).show();  
        }else {
            $(`#${state}`).hide();
        }
    }
)   
    $('#remaining-trials').text(gameData.remainingTrials);
    $('#image-file').attr('src',`images/pendu${gameData.trials}.gif`);
    $('.word').text(gameData.word);
    //if(){
//        $.ajax('../views/winning.html', {
//            success: function(winning) {
//                $('body').append(winning).slideDown();
//                $('#playing').hide();
//            };
//        });
    //}
    //if(){
//    $.ajax('../views/losing.html', {
//            success: function(losing) {
//                $('body').append(losing).slideDown();
//                $('#playing').hide();    
//}
};