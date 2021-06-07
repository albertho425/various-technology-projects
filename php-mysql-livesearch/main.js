
 /**
 *  Fetch the search data
 *  
 */

function search(name) {
    console.log(name);
    fetchSearchData(name);
}

/**
 *  Fetch the search data
 *  
 */

function fetchSearchData(name) {

    fetch('search.php', {
        method: 'POST',
        body: new URLSearchParams('name=' + name )
    })
    
    // fetch the result in text format
    // .then(res => res.text())
    

    .then(res => res.json())   
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