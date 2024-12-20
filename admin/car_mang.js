// Filter/Search Table
const searchInput = document.createElement('input');
searchInput.setAttribute('type', 'text');
searchInput.setAttribute('placeholder', 'Search Cars...');
searchInput.classList.add('form-control', 'mb-3');

const contentDiv = document.querySelector('.content');
contentDiv.insertBefore(searchInput, contentDiv.querySelector('table'));

searchInput.addEventListener('keyup', () => {
    const filter = searchInput.value.toLowerCase();
    const rows = document.querySelectorAll('.table tbody tr');
    rows.forEach((row) => {
        const cells = row.querySelectorAll('td');
        const match = Array.from(cells).some((cell) =>
            cell.textContent.toLowerCase().includes(filter)
        );
        row.style.display = match ? '' : 'none';
    });
});