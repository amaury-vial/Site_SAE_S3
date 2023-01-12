function lisenerFormId(){
    let id = document.getElementById("idquestion").value;
    fetch("../php/selectQuestionById.php?idquestion="+id)
        .then(response =>
            response.json())
        .then(data => {
            document.getElementById("question").value = data.title;
            document.getElementById("consigne").value = data.txt;
            document.getElementById("reponse").value = data.solution;
            document.getElementById("indice").value = data.suggestion;
        })
        .catch(error => console.log(error));
}
