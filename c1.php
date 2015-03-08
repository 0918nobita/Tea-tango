<!DOCTYPE html>
<html>
<head>
<title>ユメタン711～740┃Tea-tango</title>
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
	"【名詞】事例、場合;事件、事態","case",
	"【名詞】ふた","lid",
	"【名詞】返答、応答;反応","response",
	"【名詞】損害、危害;悪意","harm",
	"【名詞】刑務所、拘置所","prison",
	"【名詞】恐れ、危険","risk",
	"【名詞】流行、ファッション;流儀、仕方","fashion",
	"【名詞】方針、政策;保険規約","policy",
	"【名詞】混同;混合物","mixture",
	"【名詞】規範、基準;コード、信号、暗号;法典","code",
	"【名詞】余暇、レジャー、自由時間","leisure",
	"【名詞】割れ目、切れ目;隔たり、ギャップ","gap",
	"【名詞】悲しみ、悲嘆","sorrow",
	"【名詞】程度、度合い;(緯度、経度、温度などの)度","degree",
	"【名詞】状態、様子;(特に主権を有する)国家;(アメリカなどの)州","state",
	"【名詞】頂点、絶頂;山頂、峰","peak",
	"【名詞】観念、概念;見解、意見","notion",
	"【名詞】汗　【動詞】汗をかく","sweat",
	"【名詞】気分、機嫌;気質、気性","temper",
	"【名詞】(同種類・似たものの)連続、一続き;連続出版物、連続番組、シリーズ","series",
	"【名詞】(特定の)機会、時、場所、折;出来事、行事;機会","occasion",
	"【名詞】見通し、ビジョン;視覚","vision",
	"【名詞】封筒、包装材","envelope",
	"【名詞】実験室、研究室","laboratory",
	"【名詞】文、センテンス;判決、刑罰","sentence",
	"【名詞】構造、構成、組織;建物、建造物　【動詞】～を組み立てる","structure",
	"【名詞】王国、王政","kingdom",
	"【名詞】(しばしばE-)帝国　【形容詞】帝政風の","empire",
	"【名詞】マイクロ波　【形容詞】マイクロ波の、電子レンジの","microwave",
	"【名詞】場所、位置;遺跡;(事件などの)現場","site"
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