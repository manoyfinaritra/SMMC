
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="1;url=logout.php"> <!-- Redirection automatique après 5 secondes -->
    <title>Confirmation</title>
    <style>
        body{
            background-image:url('./Pellicule\ Photo/fond1.jpg');
        }
        /* Styles de base pour le pre-loader */
.theme-loader {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(255, 255, 255, 0.8);
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 9999;
}

.loader-track {
    display: flex;
    justify-content: center;
    align-items: center;
}

.preloader-wrapper {
    width: 50px;
    height: 50px;
    position: relative;
}

.spinner-layer {
    position: absolute;
    width: 100%;
    height: 100%;
    border-radius: 50%;
    animation: rotate 1.2s linear infinite;
}

.spinner-blue {
    border: 4px solid blue;
}

.spinner-red {
    border: 4px solid red;
}

.spinner-yellow {
    border: 4px solid yellow;
}

.spinner-green {
    border: 4px solid green;
}

.circle-clipper {
    width: 50%;
    height: 100%;
    overflow: hidden;
    position: absolute;
}

.circle-clipper.left {
    left: 0;
}

.circle-clipper.right {
    right: 0;
}

.circle {
    width: 100%;
    height: 100%;
    border-radius: 50%;
    background-color: transparent;
    border: 4px solid currentColor;
}

.gap-patch {
    position: absolute;
    top: 0;
    left: 45%;
    width: 10%;
    height: 100%;
    overflow: hidden;
}

@keyframes rotate {
    100% {
        transform: rotate(360deg);
    }
}

    </style>
</head>
<body>
    <!-- Pre-loader start -->
	<div class="theme-loader">
		<div class="loader-track">
			<div class="preloader-wrapper">
				<div class="spinner-layer spinner-blue">
					<div class="circle-clipper left">
						<div class="circle"></div>
					</div>
					<div class="gap-patch">
						<div class="circle"></div>
					</div>
					<div class="circle-clipper right">
						<div class="circle"></div>
					</div>
				</div>
				<div class="spinner-layer spinner-red">
					<div class="circle-clipper left">
						<div class="circle"></div>
					</div>
					<div class="gap-patch">
						<div class="circle"></div>
					</div>
					<div class="circle-clipper right">
						<div class="circle"></div>
					</div>
				</div>

				<div class="spinner-layer spinner-yellow">
					<div class="circle-clipper left">
						<div class="circle"></div>
					</div>
					<div class="gap-patch">
						<div class="circle"></div>
					</div>
					<div class="circle-clipper right">
						<div class="circle"></div>
					</div>
				</div>

				<div class="spinner-layer spinner-green">
					<div class="circle-clipper left">
						<div class="circle"></div>
					</div>
					<div class="gap-patch">
						<div class="circle"></div>
					</div>
					<div class="circle-clipper right">
						<div class="circle"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Pre-loader end -->
    <script>
        	window.onload = function() {
			// Ajoute un délai de 2 secondes avant de masquer le pre-loader
			setTimeout(function() {
				var loader = document.querySelector('.theme-loader');
				loader.style.display = 'none';
			}, 2000); // 1500 millisecondes = 1.5 secondes
		};
    </script>
</body>
</html>
