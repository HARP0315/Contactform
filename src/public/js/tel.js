document.addEventListener('DOMContentLoaded', function() {
    // 各電話番号入力フィールドと隠しフィールドを取得
    const telPart1 = document.getElementById('tel-part1');
    const telPart2 = document.getElementById('tel-part2');
    const telPart3 = document.getElementById('tel-part3');
    const fullTelInput = document.getElementById('full-tel');
    const form = document.querySelector('form'); // フォーム全体を取得

    // フォームが送信される直前に実行されるイベントリスナー
    form.addEventListener('submit', function(event) {
        // 各入力フィールドの値を結合
        const fullPhoneNumber = `${telPart1.value}-${telPart2.value}-${telPart3.value}`;

        // 結合した値を隠しフィールドにセット
        fullTelInput.value = fullPhoneNumber;

    });

});
