<html>

<head>
    <link href="https://fonts.cdnfonts.com/css/apercu">
    <title>Selesaikan Pembayaran</title>
    <style>
        .columnDist {
            padding-left: 20px;
        }

        .floatRight {
            padding-left: 20px;
            float: right;
        }

        td {
            border: 0;
        }

        .borderTable {
            border: 1px solid #EEEEEE;
            box-sizing: border-box;
            border-radius: 4px;
            border-collapse: collapse;
            margin-bottom: 16px;
            width: 100%;
        }

        .button {
            background-color: blue;
            /* Green */
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
        }
    </style>
</head>

<body style="
   font-family: 'Apercu';
   color: #4E4F52;
   font-size: 16px;
   background:#f2f5f8; 
   background-image: grey; ">
    <div style="margin: 0 auto 0 auto; width: 560px;">
        <div style="padding-top: 55px; text-align : center;">
            <div style="font-weight: 700;font-size: 32px;">
                <span style="border-bottom: 4px solid #5050ff; font-size: 32px; ">LO-KREATIF</span>
            </div>
        </div>
        <div style="background: white">
            <main>
                <!-- Content -->
                <?php $this->load->view($module . '/' . $fileview); ?>
                <!-- End Content -->
            </main>
            <hr style="
           width: 513px; 
           margin-top: 34px;
           border-top: 1px solid #cecece; 
           border-bottom: none;" />
            <div>
                <div style="margin: 32px 56px 0 56px">
                    <div style="margin-top: 32px">
                        <img style="margin: auto;display: block;" src="https://i.ibb.co/XtvzJBX/icon-ts.png'" width="75px" height="auto" alt="DurianPay logo">
                        <div style="text-align: center; font-size: 10px;">LO-KREATIF 2021</div>
                    </div>
                </div>
            </div>
            <hr style="border-top: 1px dashed #CECECE; margin-top: 24px; border-bottom: none;">
            <div style="margin-top: 13px; text-align : center; font-size:10px;">This email has been generated
                automatically, please do not reply.</div>
            <div style="height: 12px; background: #5050ff; margin-top:10px;"></div>
        </div>
</body>

</html>