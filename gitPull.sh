#! /bin/bash

ssh-agent bash -c 'ssh-add ~/.ssh/zapleczowka_rsa; git pull'