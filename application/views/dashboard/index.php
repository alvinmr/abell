<div class="main-content">
    <div class="section">
        <div class="section-header">
            <h1>Dashboard</h1>
        </div>

        <div class="section-body">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="card p-5 card-welcome">
                            <h2>Hai, <?= $this->session->userdata('name') ?></h2>
                            <p>Selamat Datang di Abell</p>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Kalender</h4>
                            </div>
                            <div class="card-body">
                                <div class="fc-overflow">
                                    <div id="myEvent"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12 table-hari">
                        <div class="card text-center">
                            <div class="card-header">
                                <h4 style="font-size: 28px;">Jadwal Bell Hari <?= nama_hari(date('Y-m-d')); ?></h4>
                            </div>
                            <div class="card-body">

                                <div class="table-responsive text-left">
                                    <table class="table table-bordered" id="table-1">
                                        <thead style=" color: white; background-color: #F1B505;">
                                            <tr>
                                                <th>No</th>
                                                <th>Hari</th>
                                                <th>Jam</th>
                                                <th>Suara Bel</th>
                                                <th>Keterangan</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <?php $i = 0; foreach($jadwal_hari as $j): ?>
                                            <?php $i++;  ?>
                                            <tr>
                                                <td><?= $i ?></td>
                                                <td><?= $j['hari'] ?></td>
                                                <td style="font-weight: bold;"><?= date('H:i',strtotime($j['jam'])) ?></td>
                                                <td><?= $j['audio'] ?></td>
                                                <td><?= $j['keterangan'] ?></td>
                                            </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

<style>
.card-welcome {
    background-image: url("<?= base_url('assets/img/illustration/illustration2.png') ?>");
    background-size: 350px;
    background-repeat: no-repeat;
    background-position: 105% 55%;
    background-color: #2274b0;
    color: white;
}

.table-hari {
    margin-top: -32%;

}

@media only screen and (max-width: 600px) {
    .card-welcome {
        background-image: none;
    }

    .table-hari {
        margin-top: 20px;

    }
}
</style>

<script>
$(document).ready(function() {
    $("#myEvent").fullCalendar({
        height: "600",
        header: {
            left: "prev,next today",
            center: "title"
        },
        editable: true,
        locale: "id"
    });
});
</script>