FROM centos:latest

MAINTAINER Kihi

RUN set -x \
 && yum -y update \
 && yum -y install epel-release \
 && sed -i 's/enabled=1/enabled=0/g' /etc/yum.repos.d/epel*.repo \
 && rpm -ivh http://rpms.famillecollet.com/enterprise/remi-release-7.rpm \
 && sed -i 's/enabled=1/enabled=0/g' /etc/yum.repos.d/remi*.repo \
 && yum -y --enablerepo=remi-php71 install php php-fpm php-pdo php-mysqlnd \
 && yum clean all

CMD ["/bin/bash"]
