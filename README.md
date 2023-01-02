# YoloV5_TireDetect
Study Object Detect. (YoloV5, VGG)<br/>
Serving - Apache PHP Web Server
<br/><hr/><br/>

### 프로젝트 주제
- YoloV5를 활용한 차량의 타이어 검출 및 타이어 crack Detect

### 프로젝트 내용
- Object Detection Study Toy Project
- Using YoloV5, VGG Model
- Serving Apache PHP Web Server
- 초기 기획은 타이어 마모 상태를 확인하여 교체 필요 여부를 판별하는 모델 타이어를 인식하는 모델이 필요할 것이라 생각하여 YOLOv5을 사용하여, 사진 속에서 타이어 부분을 추출해내는 모델을 구현
- 웹 상에서 서비스 시제품을 사용할 수 있도록 구현
- 추가 기획으로 타이어의 제조사 등을 인식하여 정보를 추출하도록 만들고 싶었으나 프로젝트 기간이 짧아 완료하지 못하였음.

### 데이터
- Github 용량 문제로 Remove

### 개발환경
- Apple Silicon M1 MacMini CTO, MacBook Air, Intel NUC(Centos7 Web Server)
- Python 3.8, OpenCV, YoloV5, Sklearn, Pandas, Apache, PHP, ETC...

### 프로젝트 기대효과
- 타 사의 차량 번호판 및 차종 및 모델, 외관손상 등을 인식하는 YoloV4 Model을 보았고, 이를 확장한다면 상용화 하기 좋은 아이템이 될 수 있을 것 같아 기획하게 되었다.
- 타이어의 경우 차량 운전자들이 놓치기 쉬운 부분이고 차량 정비시 이른바 '사기'를 치기 쉬워 이와 관련된 이슈들이 메스컴을 통해 보도된 바 있다.
- 차량 타이어를 검출하여 타이어 마모 상태를 자체적으로 점검할 수 있다면, 고속도로에서 타이어 펑크의 사고 등과 같은 타이어 관련 사고들을 미리 예방할 수 있을 것이며,
- 차량에 관한 지식이 조금 부족하더라도 내 차량의 타이어 연식과 마모 상태를 인지하여 사고를 예방할 수 있을 것이다.
- 이외에도 차량 정비 및 보험사 등에서도 사용하기 좋을 것이라는 판단 하에, 초보운전자/차량정비소/보험사를 타깃 설정해두고 개발하게 되었다.

### References
[YoloV5 Copyright](https://github.com/ultralytics/yolov5) <br/>
[Tire Dataset and Baseline Model](https://www.kaggle.com/datasets/jehanbhathena/tire-texture-image-recognition)
