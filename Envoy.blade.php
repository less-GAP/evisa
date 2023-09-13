@servers(['web' => 'root@134.122.4.168'])

@task('deploy')
    cd /home/evisa
    git pull origin main
    sh build.sh
    sh run.sh
@endtask
