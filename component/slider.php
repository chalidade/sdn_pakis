<div class="container" id="slider" style="width:100%;margin:0px;height: 600px;z-index:-1;">
	<div data-am-fadeshow="next-prev-navigation autoplay">
		<!-- Radio -->
		<input type="radio" name="css-fadeshow" id="slide-1" />
		<input type="radio" name="css-fadeshow" id="slide-2" />
		<input type="radio" name="css-fadeshow" id="slide-3" />
		<input type="radio" name="css-fadeshow" id="slide-4" />

		<!-- Quick Navigation -->
		<div class="fs-quick-nav" style="position: absolute;bottom: 120px;z-index:5">
			<label class="fs-quick-btn" for="slide-1"></label>
			<label class="fs-quick-btn" for="slide-2"></label>
			<label class="fs-quick-btn" for="slide-3"></label>
			<label class="fs-quick-btn" for="slide-4"></label>
		</div>

		<!-- Prev Navigation -->
		<!-- <div class="fs-prev-nav" style="z-index:3">
			<label class="fs-prev-btn" for="slide-1"></label>
			<label class="fs-prev-btn" for="slide-2"></label>
			<label class="fs-prev-btn" for="slide-3"></label>
			<label class="fs-prev-btn" for="slide-4"></label>
		</div> -->

		<!-- Next Navigation -->
		<!-- <div class="fs-next-nav" style="z-index:3">
			<label class="fs-next-btn" for="slide-1"></label>
			<label class="fs-next-btn" for="slide-2"></label>
			<label class="fs-next-btn" for="slide-3"></label>
			<label class="fs-next-btn" for="slide-4"></label>
		</div> -->

		<!-- Slides -->
		<div class="fs-slides">
			<div class="fs-slide" v-bind:style="'background:url(admin/resource/public/Slider/'+info[0].SLIDER_IMG+');background-size:cover;'">
				<div style="position:absolute;width:100%;background:#000;height:600px;z-index:1;opacity:0.5"></div>
				<!-- Add content to images (sample) -->
				<div style="position: absolute;z-index:2; top: 50%; left: 50%; transform: translate(-50%, -50%); color: white; font-family: sans-serif; text-align: center; text-shadow: 0 0 20px rgba(0,0,0,0.5);">
					<h1 style="margin-top: 0;z-index:2; margin-bottom: 0.8vw; font-size: 32px;font-family:lato ;font-weight: bold;text-transform:capitalize">{{info[0].SLIDER_TITLE}}</h1>
					<p style="font-size: 14px; font-weight: 100; margin-top: 0;font-family:lato ;">{{info[0].SLIDER_DESC}}</p>
				</div>
			</div>
      <div class="fs-slide" v-bind:style="'background:url(admin/resource/public/Slider/'+info[1].SLIDER_IMG+');background-size:cover;'">
				<div style="position:absolute;width:100%;background:#000;height:600px;z-index:1;opacity:0.5"></div>
        <!-- Add content to images (sample) -->
				<div style="position: absolute; top: 50%;z-index:2; left: 50%; transform: translate(-50%, -50%); color: white; font-family: sans-serif; text-align: center; text-shadow: 0 0 20px rgba(0,0,0,0.5);">
					<h1 style="margin-top: 0;z-index:2; margin-bottom: 0.8vw; font-size: 32px;font-family:lato ;font-weight: bold;text-transform:capitalize">{{info[1].SLIDER_TITLE}}</h1>
					<p style="font-size: 14px; font-weight: 100; margin-top: 0;font-family:lato ;">{{info[1].SLIDER_DESC}}</p>
				</div>
      </div>
			<div class="fs-slide" v-bind:style="'background:url(admin/resource/public/Slider/'+info[2].SLIDER_IMG+');background-size:cover;'">
				<div style="position:absolute;width:100%;background:#000;height:600px;z-index:1;opacity:0.5"></div>
        <!-- Add content to images (sample) -->
				<div style="position: absolute; top: 50%; z-index:2;left: 50%; transform: translate(-50%, -50%); color: white; font-family: sans-serif; text-align: center; text-shadow: 0 0 20px rgba(0,0,0,0.5);">
					<h1 style="margin-top: 0;z-index:2; margin-bottom: 0.8vw; font-size: 32px;font-family:lato ;font-weight: bold;text-transform:capitalize">{{info[2].SLIDER_TITLE}}</h1>
					<p style="font-size: 14px; font-weight: 100; margin-top: 0;font-family:lato ;">{{info[2].SLIDER_DESC}}</p>
				</div>
      </div>
			<div class="fs-slide" v-bind:style="'background:url(admin/resource/public/Slider/'+info[3].SLIDER_IMG+');background-size:cover;'">
				<div style="position:absolute;width:100%;background:#000;height:600px;z-index:1;opacity:0.5"></div>
        <!-- Add content to images (sample) -->
				<div style="position: absolute; top: 50%; left: 50%;z-index:2; transform: translate(-50%, -50%); color: white; font-family: sans-serif; text-align: center; text-shadow: 0 0 20px rgba(0,0,0,0.5);">
					<h1 style="margin-top: 0;z-index:2; margin-bottom: 0.8vw; font-size: 32px;font-family:lato ;font-weight: bold;text-transform:capitalize">{{info[3].SLIDER_TITLE}}</h1>
					<p style="font-size: 14px; font-weight: 100; margin-top: 0;font-family:lato ;">{{info[3].SLIDER_DESC}}</p>
				</div>
      </div>
		</div>
	</div>
</div>
