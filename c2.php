<!DOCTYPE html>
<html>
<head>
<title>ユメタン561～590┃Tea-tango</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width,inital-scale=1.0,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no">
<link rel="stylesheet" type="text/css" href="eitango.css">
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<script language="javascript" src="eitango_header.js"></script>
</head>
<body>
<script>header();</script>
<div class="main">
<script>
myQA = new Array(	//問題テーブル
	"【動詞】～を満足させる、喜ばせる","satisfy",
	"【動詞】～を攻撃する、～に襲い掛かる　【名詞】攻撃、襲撃","attack",
	"【動詞】～を記録する;～を録音[録画]する","record",
	"【動詞】進路を変える、回転する;～の進路を変える","turn",
	"【動詞】過ぎる、通過する、追い越す;～に…を手渡す","pass",
	"【動詞】～を繰り返して言う、復唱する;～を繰り返す","repeat",
	"【動詞】～を気にする、嫌だと思う　【名詞】心、精神","mind",
	"【動詞】～であればよいのにと思う","wish",
	"【動詞】(音が)聞こえる;音が鳴る　【名詞】音、音声","sound",
	"【形容詞】有名な、名高い","famous",
	"【形容詞】静かな、音を立てない、閑静な　【名詞】静けさ、閑静","quiet",
	"【形容詞】安い、安価な;安っぽい","cheap",
	"【形容詞】固体の、固形の;硬い　【名詞】固形物","solid",
	"【形容詞】湿り気のある;(目が)うるんだ","moist",
	"【形容詞】恥ずかしがりの、内気な","shy",
	"【形容詞】さまざまな、いろいろな","various",
	"【形容詞】普通の、平均の;正常な、標準的な","normal",
	"【形容詞】利口な、頭が良い","clever",
	"【形容詞】馬鹿げた、愚かな","foolish",
	"【形容詞】正式な、公式の;形式上の、うわべだけの","formal",
	"【形容詞】準備ができた;すぐに～できる(to do)","ready",
	"【形容詞】いつもの、通例の","usual",
	"【形容詞】そのような、そんな;非常に～な","such",
	"【形容詞】丸い、円形の、円筒状の、球状の","round",
	"【形容詞】馬鹿な、愚かな;面白くない","stupid",
	"【形容詞】すっぱい;不愉快な、不機嫌な","sour",
	"【形容詞】高価な、金のかかる","expensive",
	"【形容詞】いくつかの","serveral",
	"【形容詞】(事が)間違った、誤った;(人が)誤っている","wrong",
	"【動詞】～の後について行く;～の次に起こる;～に従う","follow"
);
myNowCnt = 0;	//問題を出すテーブルカウンタ
myLastCnt = 30;	//問題の数
myDiffCnt = 0; //間違えた回数
function myQues(){
	if (myNowCnt == 30){
		alert("終了です！お疲れ様でした！");
		return;
	}
	myA = prompt("問題 : "+myQA[myNowCnt*2],"");
	if ( myA != null ){	// キャンセルボタンでない?
		if ( myA == myQA[myNowCnt*2+1] ){	// スペル正解?
			myNowCnt=myNowCnt+1;	// 次の問題へ
		}else{	// スペル間違った
			alert("はずれ！　答えは "+myQA[myNowCnt*2+1]+" です！");
			myDiffCnt = myDiffCnt + 1;
		}
		myQues();	
	}
}
</script>
<p>30個の英単語が順番にポップアップで出題され、間違っていると画面が変わって正答が表示されます。それを確認し頭の中で数回反復して、[OK]をタッチして続行してください。いつでも[キャンセル]で終了できます。間違えた問題は一時的に記録し、テストが終了した時点で端末に保存されます。</p>
<form name="myForm">
<input type="button" value="英単語の勉強を始める" onclick="myQues()">
</form>
<p>バグ等を発見した場合はTwitter <a href="http://twitter.com/0918nobita" style="text-decoration:none;">@0918nobita</a> までご連絡ください。</p>
</div>
</body>
</html>