
// return the selected filter
function $(selector){
    return document.querySelector(selector);
}

//display project data with pagination length on web page
load_project('1');

function load_project(page=1) {
 
    fetch('script.php?page?page='+page+'')
    .then(function(response){
        return response.json();
    }
).then(function(responseData){//get data from server
let html='';
if(responseData.data){
    if(responseData.data.length> 0){
html +='<p class="h6"> '+responseData.total_data+'</p>';
html +='<div class="row">';
// display cards from db
for(let i = 0; i < responseData.data.length; i++)
{
    html += '<div class="col-md-3 mb-2 p-3">';

    html += '<img src ="'+responseData.data[i].image+'" class="img-fluid border mb-3 p-3" />';

    html += '<p class="fs-6 text-center">'+responseData.data[i].name+'</p><br />';

    html += '<span class="fw-bold text-danger"><span>&#8377;</span> '+responseData.data[i].price+'</span>';

    html += '</div>';
}

html += '</div>';

$('#product_area').innerHTML = html;

    }
    else{
        $('#product_area').innerHTML='<p class ="h6"> No Product Found</p>';

    }
}

if(responseData.pagination)
{
    //so it could display pagination length on web page
    $('#pagination_area').innerHTML = responseData.pagination;
}

setTimeout(function(){

    $('#product_area').style.display = 'block';

    $('#skeleton_area').style.display = 'none';

}, 3000);});





}