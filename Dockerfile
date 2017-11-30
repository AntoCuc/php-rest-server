##########################################################################
#
# PHP REST Server
#
##########################################################################
#
# An Open Source REST server for PHP
#
# This content is released under the MIT License (MIT)
#
# Copyright (c) 2015, Antonino Cucchiara
#
# Permission is hereby granted, free of charge, to any person
# obtaining a copy of this software and associated documentation
# files (the "Software"), to deal in the Software without restriction,
# including without limitation the rights to use, copy, modify, merge,
# publish, distribute, sublicense, and/or sell copies of the Software,
# and to permit persons to whom the Software is furnished to do so,
# subject to the following conditions:
#
# The above copyright notice and this permission notice shall be
# included in all copies or substantial portions of the Software.
#
# THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND,
# EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES
# OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND
# NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS
# BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN
# ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN
# CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
# THE SOFTWARE.
#
# @copyright Copyright (c) 2015, Antonino Cucchiara
# @license http://opensource.org/licenses/MIT	MIT License
#
##########################################################################

#
# The base image
#
FROM debian:stretch

#
# Configure a default non-interactive image
#
ARG DEBIAN_FRONTEND=noninteractive

#
# The maintainer
#
MAINTAINER Antonino Cucchiara <antonio_cuc@yahoo.co.uk>

##########################################################################
#
# Base image software installation
#
##########################################################################

#
# Update distro repos
#
RUN apt-get update

#
# Upgrade distro packages
#
RUN apt-get -y upgrade

#
# Install configuration utilities
#
RUN apt-get -y install apt-utils

#
# Install the Vim editor
#
RUN apt-get -y install vim

#
# Install Apache2
#
RUN apt-get -y install apache2

#
# Install PHP 7.0
#
RUN apt-get -y install php7.0

#
# Install Apache2 PHP 7.0 module
#
RUN  apt-get -y install libapache2-mod-php7.0

#
# Enable Apache2 PHP binding
#
RUN a2enmod php7.0

#
# Enable the rewrite module
#
RUN a2enmod rewrite

#
# Configure the Apache2 user
#
ENV APACHE_RUN_USER www-data

#
# Configure the Apache2 user group
#
ENV APACHE_RUN_GROUP www-data

#
# Configure the Apache2 logs directory
#
ENV APACHE_LOG_DIR /var/log/apache2

#
# Configure the Apache2 lockfile directory
#
ENV APACHE_LOCK_DIR /var/lock/apache2

#
# Configure the Apache2 process id file
#
ENV APACHE_PID_FILE /var/run/apache2.pid

#
# Expose the Apache2 service port
#
EXPOSE 80

#
# Include the scripts directory
#
COPY . /var/www/html

#
# Include the Apache2 configuration
#
COPY apache-config.conf /etc/apache2/sites-enabled/000-default.conf

#
# Start Apache2 in the foreground
#
CMD /usr/sbin/apache2ctl -D FOREGROUND