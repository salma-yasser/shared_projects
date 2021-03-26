<style>
    .asider {
        float: left;
        width: 100%;
        background: #dfdfdf;
        padding: 100px 0;
        margin-bottom: 5px;
        z-index: 1000;
        position: fixed;
    }

    #side_ad {
        position: fixed;
        top: calc(50% - 112px);
        right: 42px;
        height: 154px;
        background-color: white;
        z-index: 1000;
    }

    /* sticky button */

    #feedback1 {
        height: 0px;
        width: 85px;
        position: fixed;
        right: 0;
        top: 50%;
        z-index: 1000;
        transform: rotate(-90deg);
        -webkit-transform: rotate(-90deg);
        -moz-transform: rotate(-90deg);
        -o-transform: rotate(-90deg);
        filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=3);
    }

    #feedback1 a {
        display: block;
        height: 52px;
        width: 155px;
        font-family: Arial, sans-serif;
        font-size: 17px;
        font-weight: bold;
        text-decoration: none;
    }

    #feedback {
        height: 0px;
        width: 85px;
        position: fixed;
        right: 0;
        top: 50%;
        z-index: 1000;
        transform: rotate(-90deg);
        -webkit-transform: rotate(-90deg);
        -moz-transform: rotate(-90deg);
        -o-transform: rotate(-90deg);
    }

    #feedback a {
        display: block;
        height: 52px;
        padding-top: 10px;
        width: 155px;
        text-align: center;
        font-family: Arial, sans-serif;
        font-size: 17px;
        font-weight: bold;
        text-decoration: none;
    }


    @media (min-width: 601px) {
        #side_ad {
            display: block;
            /* min-width: 230px; */
            max-width: 400px;
            width: 50%;
        }
    }

    @media (max-width: 600px) {
        #side_ad {
            display: none;
            width: 75%;
        }
    }
</style>


<div class="asider">
    <div id="feedback">
        <a onclick="$('#side_ad').animate({width: [ 'toggle', 'swing' ]}, 'slow');" style="color: white;background: rgba(0, 0, 0, 0) -webkit-linear-gradient(left, rgb(97, 123, 172) 0%, rgb(79, 210, 219) 100%) repeat scroll 0% 0% !important;">Great
            News</a>
    </div>
    <div id="side_ad" class="rounded-left" style="filter: drop-shadow(2px 3px 8px #ACC9F5);" data-aos="fade-left" data-aos-easing="linear" data-aos-duration="500">
        <div class="modal-body text-center p-2 pt-3" style="margin: 0;
  position: absolute;
  top: 50%;
  -ms-transform: translateY(-50%);
  transform: translateY(-50%);">
            <p>Free evaluation, consultation, recommendations are available on site or through virtual platforms Via Zoom or Microsoft Teams.
                <a href="#contactus" style="white-space: nowrap; color:#4899c7;" onclick="$('#side_ad').animate({width: [ 'toggle', 'swing' ]}, 'slow');">contact us</a>
            </p>
        </div>
    </div>
</div>
