<html>
<head>
  <title>Tambah Data - ITS</title>
  <link rel="shortcut icon" type="image/x-icon" href="https://img.icons8.com/color/48/000000/story-book.png"/>
  <style type="text/css">
    @import url(https://fonts.googleapis.com/css?family=Poppins:400,300,600,400italic);
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        -webkit-font-smoothing: antialiased;
        -moz-font-smoothing: antialiased;
        -o-font-smoothing: antialiased;
        font-smoothing: antialiased;
        text-rendering: optimizeLegibility;
    }
    body {
        font-family: "Poppins", Helvetica, Arial, sans-serif;
        font-weight: 100;
        font-size: 12px;
        line-height: 30px;
        color: #777;
        background: #0078C1;
    }
    .container {
        max-width: 600px;
        width: 100%;
        margin: 0 auto;
        position: relative;
    }
    #styling input[type="text"],
    #styling input[type="email"],
    #styling input[type="tel"],
    #styling input[type="url"],
    #styling textarea,
    #styling button[type="submit"] {
        font: 400 12px/16px "Poppins", Helvetica, Arial, sans-serif;
    }
    #styling {
        background: #F9F9F9;
        padding: 25px;
        margin: 150px 0;
        box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
    }
    #styling h3 {
        display: block;
        font-size: 30px;
        font-weight: 300;
        margin-bottom: 10px;
    }
    #styling p {
        margin: 5px 0 15px;
        display: block;
        font-size: 13px;
        font-weight: 400;
    }
    fieldset {
        border: medium none !important;
        margin: 0 0 10px;
        min-width: 100%;
        padding: 0;
        width: 100%;
    }
    #styling input[type="text"],
    #styling input[type="email"],
    #styling input[type="tel"],
    #styling input[type="url"],
    #styling textarea {
        width: 100%;
        border: 1px solid #ccc;
        background: #FFF;
        margin: 0 0 5px;
        padding: 10px;
    }
    #styling input[type="text"]:hover,
    #styling input[type="email"]:hover,
    #styling input[type="tel"]:hover,
    #styling input[type="url"]:hover,
    #styling textarea:hover {
        -webkit-transition: border-color 0.3s ease-in-out;
        -moz-transition: border-color 0.3s ease-in-out;
        transition: border-color 0.3s ease-in-out;
        border: 1px solid #aaa;
    }
    #styling textarea {
        height: 100px;
        max-width: 100%;
        resize: none;
    }
    #styling button[type="submit"] {
        cursor: pointer;
        width: 30%;
        border: none;
        background: #0078C1;
        color: #FFF;
        margin-top: 30px;
        padding: 10px;
        font-size: 15px;
    }
    #styling button[type="button"] {
        cursor: pointer;
        width: 30%;
        border: none;
        background: #0078C1;
        color: #FFF;
        margin-top: 30px;
        padding: 10px;
        font-size: 15px;
    }
    #styling button[type="submit"]:hover,
    #styling button[type="button"]:hover {
        background: #84DFFF;
        -webkit-transition: background 0.3s ease-in-out;
        -moz-transition: background 0.3s ease-in-out;
        transition: background-color 0.3s ease-in-out;
    }
    #styling button[type="submit"]:active {
        box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.5);
    }
    .copyright {
        text-align: center;
    }
    #styling input:focus,
    #styling textarea:focus {
        outline: 0;
        border: 1px solid #aaa;
    }
    ::-webkit-input-placeholder {
        color: #888;
    }
    :-moz-placeholder {
        color: #888;
    }
    ::-moz-placeholder {
        color: #888;
    }
    :-ms-input-placeholder {
        color: #888;
    }
    .drop {
        background: rgba(255, 255, 255, 0.3);
        -webkit-backdrop-filter: blur(10px);
                backdrop-filter: blur(10px);
        border-radius: 10px;
        border-left: 1px solid rgba(255, 255, 255, 0.3);
        border-top: 1px solid rgba(255, 255, 255, 0.3);
        box-shadow: 10px 10px 60px -8px rgba(0, 0, 0, 0.2);
        position: absolute;
        transition: all 0.2s ease;
    }
    .drop-1 {
        height: 80px;
        width: 80px;
        top: -20px;
        left: -40px;
        z-index: -1;
    }
    .drop-2 {
        height: 80px;
        width: 80px;
        bottom: -30px;
        right: -10px;
    }
    .drop-3 {
        height: 100px;
        width: 100px;
        bottom: 120px;
        right: -50px;
        z-index: -1;
    }
    .drop-4 {
        height: 120px;
        width: 120px;
        top: -60px;
        right: -60px;
    }
    .drop-5 {
        height: 60px;
        width: 60px;
        bottom: 170px;
        left: -40px;
        z-index: 1;
    }
    .btn {
        border-radius: 10px;
    }
  </style>
</head>
<body>
<div class="container">  
  <form id="styling" method="post" action="proses_simpan.php" enctype="multipart/form-data">
    <h3>Tambah Data Mata Pelajaran</h3>
    <fieldset>
        <p>Course Details</p>
        <input placeholder="Nama Mata Pelajaran"  type="text" name="nama_mapel" tabindex="1" required autofocus>
    </fieldset>
    <fieldset>
        <p>Date</p>
        <input placeholder="Masukkan Tanggal" type="date" name="tanggal" tabindex="2" required>
    </fieldset>
    <fieldset>
        <p>Teacher Name</p>
        <input placeholder="Nama Guru"  type="text" name="nama_guru" tabindex="3" required>
    </fieldset>
    <fieldset>
        <p>Status</p>
        <select for="mapel_status" name="mapel_status" tabindex="4">
            <option>
                Scheduled
            </option>
            <option>
                Postponed
            </option>
            <option>
                Asynchronous
            </option>
            <option>
                Canceled
            </option>
        </select>
    </fieldset>
    <fieldset>
        <p>Foto</p>
        <input placeholder="Upload photo here..." type="file" name="foto" tabindex="5">
    </fieldset>
    <fieldset>
        <button class="btn" name="submit" type="submit" value="Simpan" id="styling-submit" data-submit="...Sending">Submit</button>
        <button onclick="location.href='course.php'" class="btn" type="button" value="Batal">Batal</button>
    </fieldset>
  </form>
  <div>
    <div class="drop drop-1"></div>
    <div class="drop drop-2"></div>
    <div class="drop drop-3"></div>
    <div class="drop drop-4"></div>
    <div class="drop drop-5"></div>
  </div>
</div>
</body>
</html>