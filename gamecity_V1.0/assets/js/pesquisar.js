var search = document.getElementById('buscar');

search.addEventListener('keydown', function(event){
    if(event.key === 'Enter'){
        searchData();
    }
});
function searchData(){
    window.location = 'index.php?search='+search.value;
}
