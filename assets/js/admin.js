function scheduleMatch(){
    let t1 = prompt("Enter Team 1 name:");
    let t2 = prompt("Enter Team 2 name:");

    if(t1 && t2){
        location.href = "schedule_match.php?team1="+encodeURIComponent(t1)+"&team2="+encodeURIComponent(t2);
    }
}

function startMatch(){
    location.href = "start_match.php";
}

function swapMatch(){
    location.href = "swap_match.php";
}

function endMatch(){
    location.href = "end_match.php";
}

function addRun(r){
    location.href = "score_actions.php?run="+r;
}

function addWicket(){
    location.href = "score_actions.php?wicket=1";
}

function addBall(){
    location.href = "score_actions.php?ball=1";
}

function extra(type){
    location.href = "score_actions.php?extra="+type;
}

function clearDatabase(){
    if(confirm("Delete ALL matches? This cannot be undone.")){
        location.href = "clear_database.php";
    }
}
