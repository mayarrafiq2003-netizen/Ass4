<!DOCTYPE html>
<html lang="ar">
<head>
  <meta charset="UTF-8">
  <title>بيانات الطلاب المسجلين</title>
  <style>
    body {
      direction: rtl;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background-color: #3c005a;
      margin: 0;
      padding: 0;
    }

    .container {
      max-width: 900px;
      margin: 30px auto;
      background-color: #ecedeeff;
      border-radius: 15px;
      overflow: hidden;
      box-shadow: 0 5px 15px rgba(0,0,0,0.3);
    }

    .header {
      background-color: #4a0268;
      color: white;
      text-align: center;
      padding: 20px;
      font-size: 24px;
    }

    table {
      width: 100%;
      border-collapse: collapse;
    }

    th, td {
      padding: 15px;
      text-align: center;
      border-bottom: 1px solid #ddd;
    }

    th {
      background-color: #6a0dad;
      color: white;
    }

    .gap {
      font-weight: bold;
      padding: 6px 10px;
      border-radius: 5px;
      display: inline-block;
    }

    .low {
      background-color: #ffe6e6;
      color: #c0392b;
    }

    .high {
      background-color: #e6ffe6;
      color: #27ae60;
    }

    .number-btn {
      background: linear-gradient(to right, #4a0268, #6a0dad);
      border: none;
      color: white;
      border-radius: 15px;
      padding: 6px 12px;
      cursor: default;
    }

    .footer {
      background-color: #5e69a3;
      color: white;
      text-align: center;
      padding: 15px;
      font-size: 18px;
    }

    .form-container {
      padding: 20px;
      background-color: #e3dfe3ff;
      border-top: 2px solid #ccc;
    }

    .form-container input {
      padding: 10px;
      margin: 5px;
      width: 20%;
      border: 1px solid #1f0d0dff;
      border-radius: 8px;
    }

    .form-container button {
      padding: 10px 20px;
      background-color: #6c22a0ff;
      color: white;
      border: none;
      border-radius: 10px;
      cursor: pointer;
    }

    .form-container button:hover {
      background-color: #5a0099;
    }

  </style>
</head>
<body>

  <div class="container">
    <div class="header">بيانات الطلاب المسجلين</div>

    <table id="studentTable">
      <thead>
        <tr>
          <th>GPA</th>
          <th>EMAIL</th>
          <th>NAME</th>
          <th>STUDENT NO</th>
          <th>#</th>
        </tr>
      </thead>
      <tbody id="studentBody">
        <tr>
          <td><span class="gap high">88.7</span></td>
          <td><a href="mailto:ahmed@gmail.com">ahmed@gmail.com</a></td>
          <td><strong>Ahmed Ali</strong></td>
          <td>20003</td>
          <td><button class="number-btn">1</button></td>
        </tr>
        <tr>
          <td><span class="gap low">78.5</span></td>
          <td><a href="mailto:mona@gmail.com">mona@gmail.com</a></td>
          <td><strong>Mona Khalid</strong></td>
          <td>30304</td>
          <td><button class="number-btn">2</button></td>
        </tr>
        <tr>
          <td><span class="gap high">98.7</span></td>
          <td><a href="mailto:bilal@gmail.com">bilal@gmail.com</a></td>
          <td><strong>Bilal Hmaza</strong></td>
          <td>10002</td>
          <td><button class="number-btn">3</button></td>
        </tr>
        <tr>
          <td><span class="gap high">98.7</span></td>
          <td><a href="mailto:said@gmail.com">said@gmail.com</a></td>
          <td><strong>Said Ali</strong></td>
          <td>10005</td>
          <td><button class="number-btn">4</button></td>
        </tr>
        <tr>
          <td><span class="gap high">98.7</span></td>
          <td><a href="mailto:mohamed@gmail.com">mohamed@gmail.com</a></td>
          <td><strong>Mohammed Ahmed</strong></td>
          <td>10007</td>
          <td><button class="number-btn">5</button></td>
        </tr>
      </tbody>
    </table>

    <div class="footer">
      Student number: <span id="studentCount">5</span> 👥
    </div>

    <div class="form-container">
      <h3>إضافة طالب جديد</h3>
      <input type="text" id="name" placeholder="الاسم">
      <input type="email" id="email" placeholder="البريد الإلكتروني">
      <input type="text" id="studentNo" placeholder="رقم الطالب">
      <input type="number" id="gpa" placeholder="المعدل">
      <button onclick="addStudent()">إضافة</button>
    </div>
  </div>

  <script>
    function addStudent() {
      const name = document.getElementById('name').value;
      const email = document.getElementById('email').value;
      const studentNo = document.getElementById('studentNo').value;
      const gpa = parseFloat(document.getElementById('gpa').value);

      if (!name || !email || !studentNo || isNaN(gpa)) {
        alert("يرجى تعبئة جميع الحقول بشكل صحيح");
        return;
      }

      const table = document.getElementById('studentBody');
      const rowCount = table.rows.length;
      const newRow = table.insertRow();

      const gpaCell = newRow.insertCell(0);
      const emailCell = newRow.insertCell(1);
      const nameCell = newRow.insertCell(2);
      const studentNoCell = newRow.insertCell(3);
      const numberCell = newRow.insertCell(4);

      const gpaSpan = document.createElement('span');
      gpaSpan.className = 'gap ' + (gpa >= 80 ? 'high' : 'low');
      gpaSpan.textContent = gpa.toFixed(1);
      gpaCell.appendChild(gpaSpan);

      emailCell.innerHTML = `<a href="mailto:${email}">${email}</a>`;
      nameCell.innerHTML = `<strong>${name}</strong>`;
      studentNoCell.textContent = studentNo;
      numberCell.innerHTML = `<button class="number-btn">${rowCount + 1}</button>`;

      // تحديث عدد الطلاب
      document.getElementById('studentCount').textContent = rowCount + 1;

      // إعادة تعيين النموذج
      document.getElementById('name').value = '';
      document.getElementById('email').value = '';
      document.getElementById('studentNo').value = '';
      document.getElementById('gpa').value = '';
    }
  </script>

</body>
</html>
