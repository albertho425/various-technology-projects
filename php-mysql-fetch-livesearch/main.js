/**
 *  
 */

function search(name) {
    console.log(name);
    fetchSearchData(name);
}

/**
 *  Search.
 *  Note, working normally when using res.text() not working when res.json()
 */

function fetchSearchData(name) {

    fetch('search.php', {
        method: 'POST',
        body: new URLSearchParams('name=' + name )
    })
    .then(res => res.json())   
    // .then(res => res.text())
    .then(res => console.log(res))
    .then(res => viewSearchResult(res))
    .catch(e => console.error('Error: ' + e))
}

/**
 *  View the resutls
 */

function viewSearchResult(data) {
    //dataViewer from the UL in index.php
    const dataViewer = document.getElementById("dataViewer");

    //remove all the list items
    dataViewer.innerHTML = "";

    for (let i=0; i<data.legnth; i++) {
        const li = document.createElement("li");
        li.innerHTML = data[i]["name"];
        dataViewer.appendChild(li);
    }
}