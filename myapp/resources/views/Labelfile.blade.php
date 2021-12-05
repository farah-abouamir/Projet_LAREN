 <!DOCTYPE html>
<html>
<head>
    <style>
     body {
    font-family: Roboto;
}

.certificate-container {
    padding: 40px;
    width: 1400px;
}
.certificate {
    border: 20px solid #0C5280;
    padding: 40px;
    height: 680px;
    position: relative;
}

.certificate:after {
    content: '';
    top: 0px;
    left: 0px;
    bottom: 0px;
    right: 0px;
    position: absolute;
    z-index: -1;
}

.certificate-header > .logo {
    width: 80px;
    height: 80px;
}

.certificate-title {
    text-align: center;  
    font-size: 24px;  
}  
}

.certificate-body {
    text-align: center;
}

h1 {

    font-weight: 400;
    font-size: 60px;
    color: #0C5280;
}



.certificate-content {
    margin: 0 auto;
    width: 750px;
    
}

.about-certificate {
    width: 580px;
    margin: 0 auto;
    font-size: 24px;  
}

.topic-title {

  
    font-size: 20px;  
}   
    </style>    
</head>
<body>
<div class="certificate-container">
    <div class="certificate">
        <div class="certificate-header">
            <img src="images/logo.jpeg" class="logo" alt="">
        </div>
        <div class="certificate-body">
           
            <p class="certificate-title"><strong>Direction Programme Génie</strong></p>
            <h1>Certificat de qualité pédagogique numérique</h1>
            <div class="certificate-content">
                <div class="about-certificate">
                    <p>
                    Cette certificat a été remis au produit éducatif numérique "{{ $demande->nomProd }}" 
                    réalisé par l'entité "{{$demande->nom}}"
                  </p>
                </div>
                <p class="topic-title">
                Cela est dû aux niveaux techniques et pédagogiques élevés qui ont été employés dans ce produit
                </p>  
            </div>
            <div class="certificate-footer text-muted">
                <div class="row">
                    <div class="col-md-6">
                        <p>Le {{$date}}</p>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6">
                            <img src="{{ public_path('images/qrcode.png') }}" style="width: 100px; height: 100px">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>

   
