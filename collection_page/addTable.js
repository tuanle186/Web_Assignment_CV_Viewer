// this array is only for testing purposes
// query the database and fetch it in here using php and ajax

const CVArray = [
  { number: 1, name: 'Mark', lastModified: '13-12-2003' },
  { number: 2, name: 'Steve', lastModified: '15-12-2003' },
  { number: 3, name: 'Alice', lastModified: '17-12-2003' },
  { number: 4, name: 'Bob', lastModified: '19-12-2003' },
  { number: 5, name: 'Charlie', lastModified: '21-12-2003' },
  { number: 6, name: 'David', lastModified: '23-12-2003' },
  { number: 7, name: 'Emily', lastModified: '25-12-2003' },
  { number: 8, name: 'Frank', lastModified: '27-12-2003' },
  { number: 9, name: 'Grace', lastModified: '29-12-2003' },
  { number: 10, name: 'Henry', lastModified: '31-12-2003' },
  // { number: 11, name: 'Ivy', lastModified: '02-01-2004' },
  // { number: 12, name: 'Jack', lastModified: '04-01-2004' },
  // { number: 13, name: 'Karen', lastModified: '06-01-2004' },
  // { number: 14, name: 'Leo', lastModified: '08-01-2004' },
  // { number: 15, name: 'Mia', lastModified: '10-01-2004' },
  // { number: 16, name: 'Nathan', lastModified: '12-01-2004' },
  // { number: 17, name: 'Olivia', lastModified: '14-01-2004' },
  // { number: 18, name: 'Peter', lastModified: '16-01-2004' },
  // { number: 19, name: 'Quinn', lastModified: '18-01-2004' },
  // { number: 20, name: 'Rachel', lastModified: '20-01-2004' },
  // { number: 21, name: 'Sam', lastModified: '22-01-2004' },
  // { number: 22, name: 'Tina', lastModified: '24-01-2004' },
  // { number: 23, name: 'Ulysses', lastModified: '26-01-2004' },
  // { number: 24, name: 'Victoria', lastModified: '28-01-2004' },
  // { number: 25, name: 'Walter', lastModified: '30-01-2004' },
  // { number: 26, name: 'Xena', lastModified: '01-02-2004' },
  // { number: 27, name: 'Yasmine', lastModified: '03-02-2004' },
  // { number: 28, name: 'Zack', lastModified: '05-02-2004' },
  // { number: 29, name: 'Abby', lastModified: '07-02-2004' },
  // { number: 30, name: 'Ben', lastModified: '09-02-2004' },
  // { number: 31, name: 'Cathy', lastModified: '11-02-2004' },
  // { number: 32, name: 'Derek', lastModified: '13-02-2004' },
  // { number: 33, name: 'Ella', lastModified: '15-02-2004' },
  // { number: 34, name: 'Felix', lastModified: '17-02-2004' },
  // { number: 35, name: 'Gina', lastModified: '19-02-2004' },
  // { number: 36, name: 'Hank', lastModified: '21-02-2004' },
  // { number: 37, name: 'Isabel', lastModified: '23-02-2004' },
  // { number: 38, name: 'Jake', lastModified: '25-02-2004' },
  // { number: 39, name: 'Kelly', lastModified: '27-02-2004' },
  // { number: 40, name: 'Liam', lastModified: '29-02-2004' },
  // { number: 41, name: 'Megan', lastModified: '02-03-2004' },
  // { number: 42, name: 'Nolan', lastModified: '04-03-2004' },
  // { number: 43, name: 'Oliver', lastModified: '06-03-2004' },
  // { number: 44, name: 'Penny', lastModified: '08-03-2004' },
  // { number: 45, name: 'Quincy', lastModified: '10-03-2004' },
  // { number: 46, name: 'Riley', lastModified: '12-03-2004' },
  // { number: 47, name: 'Samantha', lastModified: '14-03-2004' },
  // { number: 48, name: 'Thomas', lastModified: '16-03-2004' },
  // { number: 49, name: 'Ursula', lastModified: '18-03-2004' },
  // { number: 50, name: 'Vincent', lastModified: '20-03-2004' },
];

function addTable(){
  const table = document.getElementById('tableBody'); 
  CVArray.forEach((item) => {
    const row = document.createElement('tr');
    row.innerHTML = `<th class="clickable-row">${item.number}</th><td>${item.name}</td><td>${item.lastModified}</td>`;
    row.addEventListener('click', () => {
      // sau này sẽ chỉnh lại thành 1 cái php j đó để sử lí cái cv này
      window.location.href = 'cv_process.php?cv_id=' + item.number + '&cv_name=' + item.name + '&cv_date=' + item.lastModified ;
    });
    table.appendChild(row);
  });
}

addTable();
