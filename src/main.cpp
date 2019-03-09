#include <iostream>
#include <string>
#include <fstream>
#include "nlohmann/json.hpp"
using namespace std;
using namespace nlohmann;

enum ARGV_KEY
{
    COMMAND  = 1,
    FILENAME = 2
};

class Command
{
protected:
    json j;

public:
    Command()
    {

    }

    virtual ~Command() {};

    virtual void execute() {};

};

class BuildFileCommand : public Command
{
    string filename;

public:
    BuildFileCommand(string filename = "") : Command(), filename(filename)
    {

    }

    virtual ~BuildFileCommand() {};

    void execute()
    {
        this->j["connection"]["host"] = "";
        this->j["connection"]["port"] = "";
        this->j["connection"]["name"] = "";
        this->j["connection"]["pass"] = "";

        ofstream file;

        if (filename.empty()) {
            file.open("test.json");
        } else {
            file.open(filename);
        }

        if (file.is_open()) {
            file << this->j.dump(4);
        }

        file.close();
    }

};

int main(int argc, char *argv[])
{
    string command = "", filename = "";

    if (argc > 1)
    {
        command = argv[COMMAND];
        Command *cmd = nullptr;

        switch (argc)
        {
        case 2:
            {
                if (command == "--help") {

                }

                if (command == "--build") {
                    cmd = new BuildFileCommand();
                    cmd->execute();
                }

            } break;
        case 3:
            {
                filename = argv[FILENAME];

                if (command == "--build") {
                    cmd = new BuildFileCommand(filename);
                    cmd->execute();
                }

            } break;
        default:
            {
                cerr << "Invalid arguments count" << '\n';
            } break;
        }
    }

}
