document.addEventListener('DOMContentLoaded', function () {
    // DOMContentLoaded: HTMLがすべて読み込まれてからJSを実行するための記述

    // === 1. 要素の取得 ===
    const modalOverlay = document.querySelector('.modal-overlay');
    const modalMain = document.querySelector('.modal-main');
    const modalCloseButtons = document.querySelectorAll('.js-modal-close'); // ×ボタンとオーバーレイ
    const detailButtons = document.querySelectorAll('.js-modal-open'); // 各詳細ボタン

    // お問い合わせ内容を表示する要素
    const modalName = document.getElementById('modal-name');
    const modalGender = document.getElementById('modal-gender');
    const modalEmail = document.getElementById('modal-email');
    const modalTel = document.getElementById('modal-tel');
    const modalAddress = document.getElementById('modal-address');
    const modalContent = document.getElementById('modal-content');
    const modalDetail = document.getElementById('modal-detail');
    const deleteForm = document.getElementById('delete-form');


    // === 2. モーダル表示関数 ===
    function openModal(inquiry) {
        // モーダルにお問い合わせ内容をセット
        modalName.textContent = inquiry.name;
        modalGender.textContent = inquiry.gender;
        modalEmail.textContent = inquiry.email;
        modalTel.textContent = inquiry.tel;
        modalAddress.textContent = inquiry.address;
        modalContent.textContent = inquiry.content;
        modalDetail.textContent = inquiry.detail;

        // 削除フォームのaction属性を更新
        // /inquiries/123 のようなidに合わせたURLを作ってLaravelが何を削除したらいいかわかるようにする
        deleteForm.action = `/inquiries/${inquiry.id}`;

        // モーダルの背景（オーバーレイ）を表示
        modalOverlay.classList.add('is-active');
        // モーダル本体を表示
        modalMain.classList.add('is-active');
    }

    // === 3. モーダル非表示関数 ===
    function closeModal() {
        modalOverlay.classList.remove('is-active');
        modalMain.classList.remove('is-active');
    }

    // === 4. イベントリスナーの設定 ===

    // 各詳細ボタンにクリックイベントを設定
    detailButtons.forEach(button => {
        button.addEventListener('click', function (event) {
            event.preventDefault(); // デフォルトのリンク動作をキャンセル

            // ボタンのdata属性からお問い合わせデータを取得
            // HTML側で data-id, data-name, data-email,など設定する
            const inquiry = {
                id: button.dataset.id,
                name: button.dataset.name,
                gender: button.dataset.gender,
                email: button.dataset.email,
                tel: button.dataset.tel,
                address: button.dataset.address,
                content: button.dataset.content,
                detail: button.dataset.detail
            };
            openModal(inquiry);
        });
    });

    // 閉じるボタンとオーバーレイ以外のところ押すと閉じる
    modalCloseButtons.forEach(button => {
        button.addEventListener('click', closeModal);
    });

    // ※ エスケープキーで閉じる機能
    document.addEventListener('keydown', function(event) {
        if (event.key === 'Escape' && modalMain.classList.contains('is-active')) {
            closeModal();
        }
    });
});
