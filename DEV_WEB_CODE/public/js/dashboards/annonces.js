function toggleDiv(id) {
    var div = document.getElementById(id);

    if (div.style.display === 'none') {
        div.style.display = 'block';
    } else {
        div.style.display = 'none';
    }
}
function untoggleall() {
    var empl = document.getElementById('emploi');
    var ann = document.getElementById('annonces');
    var dem = document.getElementById('demandes');
    akhra.style.display = 'none';
    ann.style.display = 'none';
    dem.style.display = 'none';
}