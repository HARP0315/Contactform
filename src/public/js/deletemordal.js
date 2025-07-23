// TODO 課題：JS未勉強なので全くわからず。AIが書いたものを転載

document.addEventListener('DOMContentLoaded', function () {

    // === 1. 要素の取得 ===
    const modalOverlay = document.querySelector('.modal-overlay');
    const modalMain = document.querySelector('.modal-main');
    const modalCloseButtons = document.querySelectorAll('.js-modal-close');
    const detailButtons = document.querySelectorAll('.js-modal-open'); // 各詳細ボタン

    // お問い合わせ内容を表示する要素
    const modalLastName = document.getElementById('modal-last_name');
    const modalFirstName = document.getElementById('modal-first_name');
    const modalGender = document.getElementById('modal-gender');
    const modalEmail = document.getElementById('modal-email');
    const modalTel = document.getElementById('modal-tel');
    const modalAddress = document.getElementById('modal-address');
    const modalBuilding = document.getElementById('modal-building');
    const modalCategoryId = document.getElementById('modal-category_id');
    const modalDetail = document.getElementById('modal-detail');
    const deleteForm = document.getElementById('delete-form');

    // === 2. モーダル表示関数 ===
    function openModal(contact) {

        // モーダルにお問い合わせ内容をセット
        modalLastName.textContent = contact.last_name;
        modalFirstName.textContent = contact.first_name;
        modalGender.textContent = contact.gender;
        modalEmail.textContent = contact.email;
        modalTel.textContent = contact.tel;
        modalAddress.textContent = contact.address;
        modalBuilding.textContent = contact.building;
        modalCategoryId.textContent = contact.category_id;
        modalDetail.textContent = contact.detail;

        // 削除フォームのaction属性を更新
        deleteForm.action = `/admin/${contact.id}`; // ルートに合わせて変更済みと仮定

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
            // HTML側で data-id, data-last_name, data-first_name, など設定する
            const contact = {
                id: button.dataset.id,
                last_name: button.dataset.lastName,   // data-last_name は dataset.lastName に変換
                first_name: button.dataset.firstName, // data-first_name は dataset.firstName に変換
                gender: button.dataset.gender,
                email: button.dataset.email,
                tel: button.dataset.tel,
                address: button.dataset.address,
                building: button.dataset.building,
                category_id: button.dataset.categoryId, // data-category_id は dataset.categoryId に変換
                detail: button.dataset.detail
            };
            openModal(contact);
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
