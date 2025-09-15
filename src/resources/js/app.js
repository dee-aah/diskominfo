import './bootstrap';
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
import Chart from "chart.js/auto";
document.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll('.editor').forEach((editorElement) => {
        ClassicEditor
            .create(editorElement)
            .then(editor => {
                // ini penting supaya value ikut ke POST
                editor.model.document.on('change:data', () => {
                    editorElement.value = editor.getData();
                });
            })
            .catch(error => {
                console.error('CKEditor error:', error);
            });
    });
});


    window.renderKasusChart = function (labels, dataKasus) {
    const ctx = document.getElementById("kasusChartMain");
    if (!ctx) return;

    new Chart(ctx, {
        type: "bar",
        data: {
            labels: labels,
            datasets: [
                {
                    label: "Total Kasus Kekerasan",
                    data: dataKasus,
                    backgroundColor: "rgba(255, 20, 0, 1)",
                    borderColor: "rgba(255, 20, 0, 1)",
                    borderWidth: 1,
                },
            ],
        },
        options: {
            responsive: true,
            plugins: {
                legend: { position: "top" },
                title: { display: true, text: "Kasus Kekerasan Perempuan dan Anak Kota Tasikmalaya" },
            },
            scales: { y: { beginAtZero: true } },
        },
    });
};
