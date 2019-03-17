#include "initcommand.h"

InitCommand::InitCommand()
{
    file.setFileName("example.json");
    
    connectionSection["host"] = "localhost";
    connectionSection["port"] = "";
    connectionSection["user"] = "root";
    connectionSection["pass"] = "";
    
    generalSection["name"]       = "";
    generalSection["descrption"] = "";
    generalSection["author"]     = "";
    generalSection["charset"]    = "utf8";
    generalSection["type"]       = "";
    
    json.insert("connection", connectionSection);
    json.insert("general", generalSection);

    doc.setObject(json);
}

InitCommand::~InitCommand()
{
    
}

void InitCommand::execute()
{
    if (!doc.isEmpty()) {
        file.open(QIODevice::WriteOnly);
        
        if (file.isOpen()) {
            file.write(doc.toJson());
        }
        
        file.close();
    }
}
