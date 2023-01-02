<div class='filebox'>
    <form id='imageUploadForm' method='post' onsubmit="return false">
        <label id='upload' for="fileUpload">타이어 사진 업로드</label>
        <input type="file" name="fileUpload" id="fileUpload" accept='image/*'/>
        <label id="loading">작업진행중...</label>
        <img id="previewImg" alt="Upload_Image" />
        <input type='hidden' name='mode' value='tire_detect' >
        <input type='hidden' name='filename' id='filename' value='' >
        
    </form>

    <div class='resp-box'>
      <span>감지된 타이어 입니다.</span>
      <div id='append_wrap'>
      </div>
    </div>
    <label id="next_btn">계속</label>
</div>



<script>
//load
$(function() {
  $(".main-frame").css({'background-color': 'transparent'});

  $("#next_btn").on("click",function(){
    // console.log(imgPathResp);
    var form = document.getElementById("imageUploadForm");
    form.mothod = "POST";
    form.submit();
    return false;
  });

});



//파일 전송 ajax
const fileInput = document.getElementById("fileUpload");
var imgPathResp = '';

const handleFiles = (e) => {
  const selectedFile = [...fileInput.files];
  const fileReader = new FileReader();

  fileReader.readAsDataURL(selectedFile[0]);

  fileReader.onload = function () {


    $(".main-frame").css({'background-color': '#fff'});

    document.getElementById("upload").style.display = "none";
    document.getElementById("loading").style.display = "inline-block";

    var frm = document.getElementById("imageUploadForm");

    var formData = new FormData(frm);

    $.ajax({
        url			: '/tire_board/ajax_file_upload_test.php',
        type		: 'POST',
        dataType	: 'html',
        enctype		: 'multipart/form-data',
        processData	: false,
        contentType	: false,
        data		: formData,
        async		: false,
          success		: function(response) {
            console.log(response);
            if(response == "F"){
              alert("파일을 확인해주세요.");
              document.getElementById("upload").style.display = "inline-block";
              document.getElementById("loading").style.display = "none";
            }else if(response == "I"){
              alert("이미지 파일만 등록가능합니다.");
              document.getElementById("upload").style.display = "inline-block";
              document.getElementById("loading").style.display = "none";
            }else{
              imgPathResp = response;
              document.getElementById("previewImg").style.display = "block";

              $('#previewImg').attr('src', ""+response );
              $('#filename').attr('value', ""+response );
              
              

              document.getElementById("loading").style.display = "none";
              document.getElementById("next_btn").style.display = "inline-block";
            }
        },
	      error: function(jqXHR, textStatus, errorThrown) {
          alert('이미지 업로드에 실패하였습니다.');
	        console.log(textStatus+" "+errorThrown);
	      }
    });
      
    detect_ajax();

  };
};

fileInput.addEventListener("change", handleFiles);

//detect ajax
function detect_ajax(){
  rPath = '/python3/project_1/yolov5/runs/detect/result/'
  
 	$.ajax({
 		url: "/tire_board/ajax_detect.php",
 		type:"post",
    dataType: "text",
    async		: true,
		data:{"path":imgPathResp,},
          beforeSend:function(xhr) {
          },
          success:function(data, textStatus) {
            if(data == "Faild"){
              alert('타이어 검출에 실패하였습니다. 다른 이미지로 다시 시도해주세요.');
            }else{
              $(".resp-box").css({'display': 'block'});
              res_arr = data.split(',');
              
              for(let i = 0; i < res_arr.length -1; i++){
                // console.log(res_arr[i]);
                $("#append_wrap").append("<img id='previewImg' alt='Detected' style='display: block;' src='"+rPath+res_arr[i]+"'>");
              }
            }

        },
        error:function(xhr, textStatus) {
          alert('타이어 검출에 실패하였습니다. 다른 이미지로 다시 시도해주세요.');
        },
        complete:function(xhr, textStatus) {
        }
    });
}




</script>

<style>
#previewImg{
  display:none;
  max-width: 95%;
  margin: 5% auto;
  background-color: #555;
}

.filebox{
  text-align:center;
  padding-top:5%;
  padding-bottom:5%;
}

.resp-box{
  display:none;
  text-align:center;
  padding-top:5%;
  padding-bottom:5%;
}

#upload {
  display: inline-block;
  padding: .5em .75em;
  color: #fff;
  font-size: inherit;
  line-height: normal;
  vertical-align: middle;
  background-color: #21bd99;
  cursor: pointer;
  border: 1px solid #ebebeb;
  border-bottom-color: #e2e2e2;
  border-radius: .25em;
}

#loading {
  display: none;
  padding: .5em .75em;
  color: #999;
  font-size: inherit;
  line-height: normal;
  vertical-align: middle;
  background-color: #fdfdfd;
  border: 1px solid #ebebeb;
  border-bottom-color: #e2e2e2;
  border-radius: .25em;
}

#next_btn {
  display: none;
  padding: .5em .75em;
  color: #fff;
  font-size: inherit;
  line-height: normal;
  vertical-align: middle;
  background-color: #21bd99;
  border: 1px solid #ebebeb;
  border-bottom-color: #e2e2e2;
  border-radius: .25em;
  cursor: pointer;
}

.filebox input[type="file"] {  /* 파일 필드 숨기기 */
  position: absolute;
  width: 1px;
  height: 1px;
  padding: 0;
  margin: -1px;
  overflow: hidden;
  clip:rect(0,0,0,0);
  border: 0;
}

</style>