#ifndef PROJECT_H
#define PROJECT_H

#include <QJsonDocument>
#include <QJsonParseError>
#include <QJsonArray>
#include <QJsonValue>
#include <QJsonObject>
#include <QVariant>

class Project
{
    QJsonDocument project_document;

public:
    Project();
    ~Project();

    QJsonDocument document();
    void setDocument(QJsonDocument document);

    QJsonValue getSection(QString section);
    
    QString toJson();

};

#endif
