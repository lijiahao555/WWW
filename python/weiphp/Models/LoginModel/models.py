# This is an auto-generated Django model module.
# You'll have to do the following manually to clean this up:
#   * Rearrange models' order
#   * Make sure each model has one field with primary_key=True
#   * Make sure each ForeignKey has `on_delete` set to the desired behavior.
#   * Remove `managed = False` lines if you wish to allow Django to create, modify, and delete the table
# Feel free to rename the models, but don't rename db_table values or field names.
from django.db import models


class Member(models.Model):
    login_id = models.IntegerField(blank=True, null=True)
    tel = models.IntegerField(blank=True, null=True)
    name = models.CharField(max_length=24, blank=True, null=True)
    email = models.CharField(max_length=50, blank=True, null=True)

    class Meta:
        managed = False
        db_table = 'member'


class Login(models.Model):
    username = models.CharField(max_length=50)
    password = models.CharField(max_length=32)

    class Meta:
        managed = False
        db_table = 'loginmodel_login'



class WpMenu(models.Model):
    menu_type = models.IntegerField(blank=True, null=True)
    pid = models.CharField(max_length=50, blank=True, null=True)
    title = models.CharField(max_length=50, blank=True, null=True)
    url_type = models.IntegerField(blank=True, null=True)
    addon_name = models.CharField(max_length=30, blank=True, null=True)
    url = models.CharField(max_length=255, blank=True, null=True)
    target = models.CharField(max_length=50, blank=True, null=True)
    is_hide = models.IntegerField(blank=True, null=True)
    sort = models.IntegerField(blank=True, null=True)
    place = models.IntegerField(blank=True, null=True)

    class Meta:
        managed = False
        db_table = 'wp_menu'