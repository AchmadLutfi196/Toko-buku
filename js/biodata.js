function changeColor(id) {
    const element = document.getElementById(id);
    const rows = document.querySelectorAll(".my-account-menu table tr");

    rows.forEach(row => {
        row.style.backgroundColor = 'white';
        row.style.color = 'black';
    });

    element.style.backgroundColor = '#0056b3';
    element.style.color = 'white';
}
