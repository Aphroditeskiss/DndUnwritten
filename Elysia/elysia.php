<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/elysiahome.css">   
    <title>Elysia's Room</title>
</head>
<body>
    <div id="room-view">
        <button id="left-arrow"  class="arrow">&larr;</button>
        <button id="right-arrow" class="arrow">&rarr;</button>   

        <div class="hotspot" id="hotspot-book" data-view="0" style="left:65%; top:65%; width:12%; height:15%;"></div>
        <div class="hotspot" id="hotspot-portrait" data-view="0" style="left:26%; top:0.5%; width:24%;  height:70%;"></div>

        <div class="hotspot" id="hotspot-bed" data-view="1" style="left:50%; top:60%; width:40%; height:20%;"></div>
        
        <div class="hotspot" id="hotspot-closet" data-view="2" style="left: 63%; top:10%; width:20%; height:80%;"></div>

        <div id="info-modal" class="modal">
            <div class="modal-content">
                <span class="close-modal">&times;</span>   
                <h2 id="modal-title" style="display: none;"></h2>
                <div id="modal-body" class="modal-body-relative"></div>
            </div>
        </div>
    </div>

    <script src="elysiascript.js"></script>
</body>
</html>