# Generated by Django 2.0 on 2018-01-09 08:12

from django.db import migrations, models


class Migration(migrations.Migration):

    initial = True

    dependencies = [
    ]

    operations = [
        migrations.CreateModel(
            name='Auth',
            fields=[
                ('id', models.AutoField(auto_created=True, primary_key=True, serialize=False, verbose_name='ID')),
                ('open_id', models.CharField(blank=True, max_length=32, null=True)),
                ('search', models.CharField(blank=True, max_length=30, null=True)),
            ],
        ),
    ]
