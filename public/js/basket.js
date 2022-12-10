function getJsonBasket(){
    var json = window.localStorage.getItem('basket');
    json = json.replace(',]', ']');
    window.localStorage.setItem('basket', json);
    return json;
}
function getJsonBaskett(){
    var json = window.localStorage.getItem('basket');
    json = json.replace(',]', ']');
    window.localStorage.setItem('basket', json);
    return json;
}
function getnormal(){
    var json = window.localStorage.getItem('basket');
    json = json.replace(',]', ']');
    window.localStorage.setItem('basket', json);
    console.log(json);
    const parsed=JSON.parse(json);
    console.log(parsed);
    const maped=parsed.map(([id, price, desc,count]) =>({id, price, desc,count}));
    console.log(maped);
    return JSON.parse(json).map(([id, price, desc,count]) =>({id, price, desc,count}));
}
function clearBasket(){
    $('#basket-list').empty();
    $('#basket-list').html('<p class="basket-msg">Корзина очищена</p>');
    window.localStorage.setItem('basket', '[]');
}
function addToBasket(id, price, desc){
    var jsonData = String(getJsonBasket());

    var search = "[" + id + "," + price + ",\"" + desc + "\",";
    if (jsonData.includes(search)) {
        // Get count
        var buf = jsonData.substr(jsonData.indexOf(search) + search.length, jsonData.lenght);
        var count = parseInt(buf.substr(0, buf.indexOf("]")));

        // New data
        var result =
            jsonData.substr(0, jsonData.indexOf(search) + search.length) +
            String(count + 1) +
            buf.substr(buf.indexOf("]"), buf.length);

        window.localStorage.setItem('basket', result);
    }
    else {
        var allData = [];
        var pushData = [];

        if (jsonData !== "null")
            allData = JSON.parse(jsonData);
//количество
        pushData.push(id, price, String(desc), 1);
        allData.push(pushData);

        window.localStorage.setItem('basket', JSON.stringify(allData));
    }
}
function deleteFromBasket(id, price, desc){
    var jsonData = String(window.localStorage.getItem('basket'));

    var search = "[" + id + "," + price + ",\"" + desc + "\",";

    // Get count
    var buf = jsonData.substr(jsonData.indexOf(search) + search.length, jsonData.lenght);
    var count = parseInt(buf.substr(0, buf.indexOf("]")));

    // New data
    if (count > 1) {
        var result =
            jsonData.substr(0, jsonData.indexOf(search) + search.length) +
            String(count - 1) +
            buf.substr(buf.indexOf("]"), buf.length);
    }
    else {
        var result = jsonData.replace(search + String(count) + "],", "");
        result = result.replace(search + String(count) + "]", "");
        result = result.replace(search + String(count) + ",]", "]");
    }

    window.localStorage.setItem('basket', result);
    return (count - 1);
}

function newSumPrice(value) {
    $('#sumPrice').html(String(value));
    sumPrice = value;
}


function expens(){
const formatNumber = (x) => x.toString().replace(/\B(7<!\.\d*)(?=(\d{3})+(?!\d))/g, ' ');

const totalPriceWrapper = document.getElementById('total-price');

const getItemSubTotalPrice = (input) => Number(input.value) * Number(input.dataset.value)

const init = () => {
let totalCost = 0;
[...document.querySelectorAll('.basket__item')].forEach((basketItem) => {
    totalCost += getItemSubTotalPrice(basketItem.querySelector('.input'));
});
totalPriceWrapper.textContent = formatNumber(totalCost);
}
init();
}
