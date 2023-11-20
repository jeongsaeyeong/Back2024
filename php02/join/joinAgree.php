<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP 블로그 만들기</title>

    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body class="gray">

    <?php include "../include/skip.php" ?>
    <!-- skip -->

    <?php include "../include/header.php" ?>
    <!-- header -->

    <main id="main" role="main">
        <div class="intro__inner bmStyle container">
            <div class="intro__img">
                <img srcset="../assets/img/intro-2.jpg 1x,
                ../assets/img/intro-2@2.jpg 2x,
                ../assets/img/intro-2@3.jpg 3x" alt="">
            </div>
            <div class="intro__text">
                The Masterpiece<br>
                고전의 미학
            </div>
        </div>
        <section class="join__inner container">
            <h2>이용약관</h2>
            <div class="join__index">
                <ul>
                    <li class="active">1</li>
                    <li>2</li>
                    <li>3</li>
                </ul>
            </div>
            <div class="join__agree">
                <div class="agree__box">
                    <h3 class="blind">고전의 미학 이용약관</h3>
                    <div class="scroll scroll__style">I. 서문

                        1.1 본 블로그 이용약관은 [블로그 이름] (이하 "블로그"라 함)을 이용하는 모든 사용자(이하 "이용자"라 함)에게 적용됩니다. 블로그를 이용함으로써, 이용자는 이 이용약관에 동의하고 이를 준수함을 인정합니다.
                        
                        II. 이용자의 책임

                        2.1 이용자는 블로그를 사용함에 있어 모든 관련 법률 및 규정을 준수해야 합니다.

                        2.2 이용자는 다음과 같은 행동을 하지 않아야 합니다:

                        불법 콘텐츠 게시
                        다른 이용자의 개인 정보 침해
                        욕설, 혐오, 폭력적인 언어 사용
                        스팸 또는 광고성 게시물 게시
                        블로그 시스템 또는 다른 이용자의 서비스 방해
                        저작권, 상표권 또는 기타 권리의 침해
                        
                        III.블로그 운영자의 권리 및 책임

                        3.1 블로그 운영자는 블로그 내용을 모니터링하고, 불법 활동 또는 위반 행동을 식별하고 조치를 취할 권리가 있습니다.

                        3.2 블로그 운영자는 이용자에 대한 경고, 제한, 차단, 계정 삭제 및 법적 조치를 포함한 적절한 조치를 취할 수 있습니다.

                        IV. 콘텐츠 소유권

                        4.1 블로그에 게시된 모든 콘텐츠(글, 이미지, 비디오 등)는 해당 콘텐츠의 소유자에게 저작권을 가집니다. 이용자는 콘텐츠를 복제, 배포 또는 수정할 수 없습니다.

                        V. 면책 조항

                        5.1 블로그 운영자는 블로그의 가용성, 보안 및 무결성에 대해 최선의 노력을 다하겠지만, 어떠한 보증도 제공하지 않습니다.

                        5.2 블로그 이용으로 인한 어떠한 손해에 대해서도 블로그 운영자는 책임을 지지 않습니다.

                        VI. 이용약관 변경

                        6.1 블로그 운영자는 본 이용약관을 언제든지 수정할 권리가 있으며, 이용자에게 사전 고지 없이 변경될 수 있습니다.

                        6.2 변경된 이용약관은 블로그에 게시함으로써 효력이 발생하며, 이용자는 변경 사항을 정기적으로 확인해야 합니다.

                        VII. 문의

                        7.1 본 블로그 이용약관에 대한 질문, 건의사항 또는 불만 사항이 있을 경우, [문의 이메일 주소]로 연락해 주십시오.

                        본 블로그 이용약관은 [날짜]에 마지막으로 수정되었습니다.

                        이상의 내용은 일반적인 블로그 이용약관 예제이며, 블로그의 특정 목적이나 사용자 요구에 따라 수정이 필요할 수 있습니다. 또한, 법적인 조언을 얻거나 변호사의 도움을 받는 것이 좋습니다.
                    </div>
                     <div class="check">
                        <label for="agreeCheck1">
                            블로그 이용약관에 동의합니다.
                            <input type="checkbox" name="agreeCheck1" id="agreeCheck1">
                            <span class="indicator"></span>
                        </label>
                    </div>
                </div>
                <div class="agree__box">
                    <h3 class="blind">고전의 미학 개인정보취급방침</h3>
                    <div class="scroll scroll__style">개인정보취급방침
                        1. 개인 정보 수집과 사용

                        1.1. [회사 또는 블로그 이름] (이하 "당사"라 함)는 다음 목적으로 개인 정보를 수집 및 사용합니다:

                        (목적 1, 예: 회원 가입) - 이용자가 서비스에 회원으로 가입할 때 요구되는 정보 수집
                        (목적 2, 예: 이메일 소식지 구독) - 이용자가 이메일 소식지를 신청할 때 요구되는 정보 수집
                        (목적 3, 예: 컨텐츠 제공) - 웹사이트 방문자에게 관련된 콘텐츠를 제공하기 위한 정보 수집
                        1.2. 당사는 개인 정보를 명시한 목적 이외에는 사용하지 않으며, 해당 목적을 달성한 후에는 정보를 파기합니다.

                        2. 개인 정보 보관

                        2.1. 당사는 개인 정보를 웹사이트 또는 서비스를 제공하기 위한 필요한 기간 동안 보관합니다. 단, 법적 의무 또는 법률적 분쟁의 해결을 위해 정보를 보관할 수 있습니다.

                        3. 정보 보호

                        3.1. 당사는 사용자의 개인 정보를 보호하기 위해 합리적인 보안 조치를 취합니다. 이에는 데이터 암호화, 접근 제한, 레귤러 보안 검토 및 감사 등이 포함됩니다.

                        4. 개인 정보 공유

                        4.1. 당사는 이용자의 개인 정보를 제3자와 공유하지 않습니다, 제외하고 다음과 같은 경우:

                        이용자의 명시적인 동의를 받은 경우
                        법적 의무 또는 법률적 절차에 따라 정보를 제공해야 하는 경우
                        5. 쿠키 및 추적 기술

                        5.1. 당사는 쿠키 및 유사한 기술을 사용하여 웹사이트 방문자를 추적하고 향상된 사용자 경험을 제공합니다. 사용자는 브라우저 설정을 통해 쿠키를 거부하거나 제어할 수 있습니다.

                        6. 이용자의 권리

                        6.1. 이용자는 자신의 개인 정보에 대한 열람, 수정, 삭제, 또는 이용을 제한하는 권리를 가집니다. 이러한 권리를 행사하기 위해서는 [연락처 정보]로 연락하십시오.

                        7. 개인 정보취급방침 변경

                        7.1. 당사는 개인 정보취급방침을 개정할 수 있으며, 변경사항을 웹사이트에 게시합니다. 변경된 개인 정보취급방침은 게시 후 즉시 효력을 발휘합니다.

                        8. 문의사항

                        8.1. 개인 정보취급방침에 대한 질문 또는 불만 사항이 있을 경우, [문의 이메일 주소]로 연락해 주십시오.
                    </div>
                    <div class="check">
                        <label for="agreeCheck2">
                            블로그 이용약관에 동의합니다.
                            <input type="checkbox" name="agreeCheck2" id="agreeCheck2">
                            <span class="indicator"></span>
                        </label>
                    </div>
                </div>
                <button id ="agreeButton"><span><a href="joinInsert.php">동의하기</a></span></button>
            </div>
        </section>
    </main>
    <!-- main -->

    <?php include "../include/footer.php" ?>
    <!-- footer -->

    <script>
        document.getElementById("agreeButton").addEventListener("click", () => {
            const agreeCheck1 = document.getElementById("agreeCheck1");
            const agreeCheck2 = document.getElementById("agreeCheck2");

            if(agreeCheck1.checked && agreeCheck2.checked){
                window.loaction.href = "joinInsert.php";
            } else {
                alert("이용약관 및 개인정보취급방침을 동의해주세요.");
            }
        })
    </script>
</body>
</html>