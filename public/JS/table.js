function trcontent(id, start, end) {
    console.log("inside function", id, start, end);
    // var element = document.getElementById("table-heading");
    var html = `<th scope="col">S.No</th>`;
    for (let i = 0; i < 10; i++) {
        if (i % 2 == 0) {
            html += `<th scope="col">${start}</th>`;
        } else {
            html += `<th scope="col">${end}</th>`;
        }
    }
    // console.log(document.getElementById("table-heading"));
    document.getElementById(`table-heading${id}`).innerHTML = html;
}

function onChangeInput() {

    var value = document.getElementById("search-input").value;
    updateTableContaint(value, 0, false, '', '');
}

function updateTableContaint(value, id1, color, start, end) {
    for (let j = 0; j < 3; j++) {
        let id = `row${j + 1}${id1}`;
        var element = document.getElementById(id);
        var html = `<th scope="row" class="serial-number">${j + 1}</th>`;
        var count =0;
        var value = removeNewline(value)
        for (let i = 0 + j; i < value.length; i += 3) {
            if(value[i] >='A' && value[i]<='Z'){
                console.log(value[i])
                html += `<td`;

            if (
                color &&
                ((count % 2 == 0 && value[i] != start) ||
                    (count % 2 != 0 && value[i] != end))
            ) {
                html += ` class='wrong-data'`;
            }
            html+=`>${value[i]}</td>`;
            count++;
            }
        }
        element.innerHTML = html;
    }
}
function removeNewline(str){
    str = str.replace(/(\r\n|\r|\n)/g, '');
        console.log(str);
        return str;
}
